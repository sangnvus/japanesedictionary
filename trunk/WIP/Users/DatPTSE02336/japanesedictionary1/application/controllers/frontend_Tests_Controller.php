<?php
class Frontend_Tests_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper(array('form', 'url'));
        // load library
        $this->load->library(array("input","form_validation","session","my_auth","email"));
        $this->load->database(); 
        $this->load->model('Vocabulary_model');   
    }
 
    public function index(){
        $this->load->library('unit_test');

        $this->unit->run($this->testGetVocabularyByHiragana("benkyou"),"benkyou","Test Get Vocabulary By Hiragana");
        $this->unit->run($this->testGetVocabularyByHiragana("hhhhhhh"),"","Test Get Vocabulary By Hiragana");
        
        $this->unit->run($this->testSearchResults(),"hoc tap hoc","Test Get Meaning");
        $this->unit->run($this->testSearchResults(),"","Test Get Meaning");
        echo $this->unit->report();
    }
     //Test Vocabulary Model
    function testGetVocabularyByHiragana($keyword=""){        
        
            $vocab= $this->Vocabulary_model->getVocabularyByHiragana($keyword);                        
            if ($vocab!==null) {
                return $vocab->v_romaji;
            } else {
                return null;
            }            
        
    }
    
    function testSearchResults(){
        $keyword = 'benkyou';
        $optionSearch = 'sentence';
        $data ="";        
        $vocab= $this->Vocabulary_model->getVocabularyByHiragana($keyword);
        if (!is_null($vocab)) {
                    $meanings = $this->Vocabulary_model->getMeaningsByVocabId($vocab->v_id);
                    if (!is_null($meanings)) {                        
                        foreach ($meanings as $row) {
                                return $row->m_meaningvn;                  
                                      }                                      
                        } else {
                        return null;
                    }                                                               
                }else{
                    return null;
                }
    }

}
?>