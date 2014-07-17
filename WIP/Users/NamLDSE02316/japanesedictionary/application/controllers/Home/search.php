<?php 
/**
* 
*/
class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();		
		$this->load->helper("url");
		$this->load->database();		
	}
	public function searchResults() 
	{
		$keyword =  '';
		$optionSearch = '';
		if (isset($_GET['txtsearch'])) {
			$keyword = $_GET['txtsearch'];
			$optionSearch = $_GET['optionSearch'];
		}		
		switch ($optionSearch) {
			case 'sentence':
				$this->load->model('Vocabulary_model');
				$vocab= $this->Vocabulary_model->getVocabularyByHiragana($keyword);
				//var_dump($vocab); die;
				$data ="";
				if (!is_null($vocab)) {
					$meanings = $this->Vocabulary_model->getMeaningsByVocabId($vocab->v_id);
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
					//echo "<pre>";
					//print_r($data);
					//echo "</pre>";
					//die;
				}else{
					$vocab = null;	
					$data = array('vocab' => $vocab, 'keyword' => $keyword, 'optionSearch' => $optionSearch);		
				}				

				$this->load->view('user/searchResult_view', $data);
				break;
			case 'conversation':			
				$this->load->model('Conversation_model');
				//$conversation = $this->Conversation_model->getConversationByTitle($keyword);
				$conversationcontent = $this->Conversation_model->getConversationContentByHiragana($keyword);

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
				$video = $this->Video_model->getVideoByTitle($keyword);

				$data = "";
				if (!is_null($video)) {
					foreach ($video as $key => $value) {
						$data = array('videos' => $video,
									  'keyword' => $keyword,
									  'optionSearch' => $optionSearch
										);
					}
					/*echo "<pre>";
					print_r($data);
					echo "</pre>";
					die;*/
					//$data['video'] = $video;
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
				$grammar = $this->Grammar_model->getGrammarByHiragana($keyword);
					
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
					/*echo "<pre>";
					print_r($data);
					echo "</pre>";
					die;			*/
				} else {
					$grammar = null;	
					$data = array('keyword' => $keyword,
									'grammar' => $grammar, 
									'optionSearch' => $optionSearch);
				}
				$this->load->view('user/searchResult_view', $data);
				break;
			case 'specialized':
				
				break;
			default:				
				break;
		}
		
	}	

}
 ?>