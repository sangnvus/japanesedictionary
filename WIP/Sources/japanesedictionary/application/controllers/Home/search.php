<?php 
/**
* 
*/
class Search extends CI_Controller 
{
	//constructor
	//コンストラクタ
	function __construct() 
	{
		parent::__construct();		
		$this->load->helper("url");
        $this->load->helper(array('form', 'url'));
        // load library
        //　ロード　ライブラリ
        $this->load->library(array("input","form_validation","session","my_auth","email"));
		$this->load->database();	
		$this->load->library('facebook');
        $this->config->load('facebook');	
	}
	public function lookup() 
	{  
        // process posted form data
        //　データ　フォーム　プロセス 
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; 
        //Set default response 
        //デフォールト　の　レスポンス　を　セットする
        $this->load->model('Vocabulary_model'); 
        $query = $this->Vocabulary_model->lookup($keyword); 
        //Search DB 
        //　データベース　に　探す 
        if (!empty($query)) {  
            $data['response'] = 'true'; 
            //Set response
            //レスポンス　をセットする  
            $data['message'] = array(); 
            //Create array 
            //アレイ　を　クリエートする 
            foreach ($query as $row) {  
            	if (strspn($row->v_romaji,$keyword) == 0) {
            		$data['message'][] = array(   
                                        'id'=>$row->v_id,  
                                        'value' => $row->v_hiragana                                                                              
                                     );  //Add a row to array
            	} else {
                	$data['message'][] = array(   
                                        'id'=>$row->v_id,  
                                        'value' => $row->v_romaji                                                                              
                                     );  //Add a row to array  
            	}
            }  
        }  
        if ('IS_AJAX') {  
            echo json_encode($data); 
            //echo json string if ajax request                 
            //
        }  
    }
    public function lookupVideo() 
    {  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response 
        $this->load->model('Video_model'); 
        $query = $this->Video_model->lookup($keyword); //Search DB  
        if (!empty($query)) {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach ($query as $row) {  
            	$data['message'][] = array('id'=>$row->vi_id,  
                                        	'value' => $row->vi_title
                                     );  //Add a row to array  
            }  
        }  
        if ('IS_AJAX') {  
            echo json_encode($data); //echo json string if ajax request  
        }  
    }
    public function lookupConversation() 
    {  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response 
        $this->load->model('Conversation_model');

        $query = $this->Conversation_model->lookup($keyword); //Search DB         

        if (!empty($query)) {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach ($query as $row) {  
            	$data['message'][] = array('id'=>$row->con_id,  
                                    		'value' => $row->con_title                                                                             
                                     );  //Add a row to array  
            }  
        }  
        if ('IS_AJAX') {  
            echo json_encode($data); //echo json string if ajax request  
        }  
    }
    public function lookupGrammar() 
    {  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response 
        $this->load->model('Grammar_model'); 
        $query = $this->Grammar_model->lookup($keyword); //Search DB  
        if (!empty($query)) {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach ($query as $row) {  
            	if (strspn($row->g_romaji,$keyword) == 0) {
            		$data['message'][] = array('id'=>$row->g_id,  
                                        		'value' => $row->g_hiragana                                                                              
                                     );  //Add a row to array
            	} else {
                	$data['message'][] = array('id'=>$row->g_id,  
                                        'value' => $row->g_romaji                                                                              
                                     );  //Add a row to array  
            	}
            }  
        }  
        if ('IS_AJAX') {  
            echo json_encode($data); //echo json string if ajax request                 
        }  
    }
    public function lookupSpecialized() 
    {  
        // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response 
        $this->load->model('Vocabulary_model'); 
        $query = $this->Vocabulary_model->lookupSpecialized($keyword); //Search DB  
        if (!empty($query)) {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach ($query as $row) {  
            	if (strspn($row->v_romaji,$keyword) == 0) {
            		$data['message'][] = array('id'=>$row->v_id,  
                                        'value' => $row->v_hiragana                                                                              
                                     );  //Add a row to array
            	} else {
                	$data['message'][] = array('id'=>$row->v_id,  
                                        'value' => $row->v_romaji                                                                              
                                     );  //Add a row to array  
            	}
            }  
        }  
        if ('IS_AJAX') {  
            echo json_encode($data); //echo json string if ajax request                 
        }  
    }
	public function searchResults() 
	{
		$keyword = '';
		$optionSearch = '';
		if (isset($_GET['txtsearch'])) {
			$keyword = $_GET['txtsearch'];
			$optionSearch = $_GET['optionSearch'];
		}				
		switch ($optionSearch) {
			case 'sentence':
				$this->load->model('Vocabulary_model');
				$vocab = $this->Vocabulary_model->getVocabularyByHiragana(stripslashes($keyword));
				$data = "";
				if (!is_null($vocab)) {
					$meanings = $this->Vocabulary_model->getMeaningsByVocabId($vocab->v_id);
					if (!is_null($meanings)) {
						foreach ($meanings as $key => $value) {
						// lấy m_id từ meaning
							$m_id = $value->m_id;												
							$sentences = $this->Vocabulary_model->getSencencesByMeaningId($m_id);
							// gán các key của meaning thành 1 sub-array trong sentences
							$meanings[$key]->sentences = $sentences;
						}
						$data = array(
							'meanings' => $meanings, 
							'vocab' => $vocab,
							'keyword' => $keyword, 
							'optionSearch' => $optionSearch						
						);
					} else {
						$meanings = null;
						$data = array(
							'meanings' => $meanings, 
							'vocab' => $vocab,
							'keyword' => $keyword, 
							'optionSearch' => $optionSearch						
						);
					}																
				} else {
					$vocab = null;	
					$data = array('vocab' => $vocab, 'keyword' => $keyword, 'optionSearch' => $optionSearch);		
				}				
				$this->load->view('user/searchResult_view', $data);
				break;
			case 'conversation':						
				$this->load->model('Conversation_model');
				//$conversation = $this->Conversation_model->getConversationByTitle($keyword);
				$conversationcontent = $this->Conversation_model->getConversationContentByHiragana(trim($keyword," "));

				$data = "";
				if (!is_null($conversationcontent)) {					
					foreach ($conversationcontent as $key => $value) {
						$data = array('conversationcontents' => $conversationcontent,
									'keyword' => $keyword,
									'optionSearch' => $optionSearch
							);						
					}
				} else {
					$conversationcontent = null;
					$data = array('keyword' => $keyword,
								  'optionSearch' => $optionSearch,
								  'conversationcontents' => $conversationcontent
										);
				}
				$this->load->view('user/searchResult_view', $data);				
				break;
			case 'video':
				$this->load->model('Video_model');
				$video = $this->Video_model->getVideoByTitle(trim(stripslashes($keyword)));
				$data = "";
				if (!is_null($video)) {
					foreach ($video as $key => $value) {
						$data = array('videos' => $video,
									  'keyword' => $keyword,
									  'optionSearch' => $optionSearch
										);
					}
				} else {
					$video = null;
					$data = array('keyword' => $keyword,
								  'optionSearch' => $optionSearch,
								  'videos' => $video
										);
				}
				$this->load->view('user/searchResult_view', $data);				
				break;
			case 'grammar':
				$this->load->model('Grammar_model');
				$grammar = $this->Grammar_model->getGrammarByHiragana(stripslashes($keyword));

				$data = "";
				if (!is_null($grammar)) {
					foreach ($grammar as $key => $value) {
						 $g_id = $value->g_id;
						 $sentences = $this->Grammar_model->getSentenceByGrammarId($g_id);
						 $grammar[$key]->sentences = $sentences;
					}
					$data = array('grammar' => $grammar,
									'sentences' => $sentences,
									'keyword' => $keyword,
									'optionSearch' => $optionSearch
									);
				} else {
					$grammar = null;	
					$data = array('keyword' => $keyword,
									'grammar' => $grammar, 
									'optionSearch' => $optionSearch);
				}
				$this->load->view('user/searchResult_view', $data);
				break;
			case 'specialized':
				$this->load->model('Vocabulary_model');
				$vocab= $this->Vocabulary_model->getVocabularyByHiragana(stripslashes($keyword));
				
				if (!is_null($vocab)) {
					$meanings = $this->Vocabulary_model->getMeaningsSpecializedByVocabId($vocab->v_id);
					if (!is_null($meanings)) {
						foreach ($meanings as $key => $value) {
						// lấy m_id từ meaning
							$m_id = $value->m_id;												
							$sentences = $this->Vocabulary_model->getSencencesByMeaningId($m_id);
							// gán các key của meaning thành 1 sub-array trong sentences
							$meanings[$key]->sentences = $sentences;
						}
						$data = array(
							'meanings' => $meanings, 
							'vocab' => $vocab,
							'keyword' => $keyword, 
							'optionSearch' => $optionSearch						
						);
					} else {
						$meanings = null;
						$data = array(
							'meanings' => $meanings, 
							'vocab' => $vocab,
							'keyword' => $keyword, 
							'optionSearch' => $optionSearch						
						);
					}																
				} else {
					$vocab = null;	
					$data = array('vocab' => $vocab, 'keyword' => $keyword, 'optionSearch' => $optionSearch);		
				}				
				$this->load->view('user/searchResult_view', $data);
				break;
			default:				
				break;
		}		
	}	
}
 ?>