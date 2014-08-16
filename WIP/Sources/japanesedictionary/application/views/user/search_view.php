<script type="text/javascript">

$(document).ready(function() {
    var type = $('#box-select').val();
    if (type == "sentence") {
	$("#txtsearch").autocomplete({              	
        minLength: 1,  
        source:   
        function(req, add){  
            $.ajax({                      	                        	          
                url: "http://localhost/japanesedictionary/index.php/Home/search/lookup",  
                dataType: 'json',  
                type: 'POST',  
                data: req,  
                success:      
                function(data){  
                    if(data.response =="true"){  
                        add(data.message);  
                    }  
                }, 
            });  
        },         
    });  
    };
    if (type === "conversation") {
        $("#txtsearch").autocomplete({                  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                                                              
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupConversation",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req, 
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });
    };
    if (type === "video") {
            $("#txtsearch").autocomplete({                  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                                                              
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupVideo",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
        }; 

        if (type === "grammar") {
            $("#txtsearch").autocomplete({                  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                                                              
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupGrammar",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
        };

        if (type === "specialized") {
            $("#txtsearch").autocomplete({                  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                                                              
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupSpecialized",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
        };
});
function changePlaceholder2() {
		// var x = document.getElementById("box-select").selectedIndex;
		// var option = document.getElementsByTagName("option")[x].value;
		// if (option === "sentence") {
		// 	document.getElementById("txtsearch").placeholder="Hãy nhập bằng Hiragana hoặc Romaji ...";			
		// };
		// if (option === "conversation") {
		// 	document.getElementById("txtsearch").placeholder="Hãy nhập tiêu đề hội thoại ...";			
		// };
		// if (option === "video") {
		// 	document.getElementById("txtsearch").placeholder="Hãy nhập tiêu đề video ...";			
		// };
		// if (option === "grammar") {
		// 	document.getElementById("txtsearch").placeholder="Hãy nhập ngữ pháp bạn muốn tìm ...";			
		// };
		// if (option === "specialized") {
		// 	document.getElementById("txtsearch").placeholder="Hãy nhập một từ bằng Hiragana hoặc Romaji ...";			
		// };	
		// $("#txtsearch").autocomplete('destroy');
		var type = $('#box-select').val();  	        	
    	if (type === "sentence") {
            $("#txtsearch").autocomplete({              	
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                      	                        	          
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookup",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
    	};  
    	if (type === "conversation") {
    		// $("#txtsearch").ready( function() { 
            $("#txtsearch").autocomplete({              	
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                      	                        	          
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupConversation",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
    	}; 

    	if (type === "video") {
            $("#txtsearch").autocomplete({              	
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                      	                        	          
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupVideo",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
    	}; 

    	if (type === "grammar") {
            $("#txtsearch").autocomplete({              	
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                      	                        	          
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupGrammar",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
    	};

    	if (type === "specialized") {
            $("#txtsearch").autocomplete({              	
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({                      	                        	          
                        url: "http://localhost/japanesedictionary/index.php/Home/search/lookupSpecialized",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        }, 
                    });  
                },         
            });  
    	};				
	}				
</script>
<div id="box-search">
<form action="<?php echo site_url('/Home/search/searchResults') ?>" method="GET">
	<input type="text" name="txtsearch" id="txtsearch" 
	value="<?php if(isset($keyword)){ echo $keyword;} ?>" maxlength="255" placeholder="Tìm kiếm">
	<select id="box-select" name="optionSearch" onchange="changePlaceholder2()">
	<?php if (isset($optionSearch)) { ?>			
		<?php if ($optionSearch === "sentence") {?>
		<option value="sentence" <?php echo "selected"; ?>>Câu ví dụ</option>
		<?php }else {?>
		<option value="sentence">Câu ví dụ</option> 
		<?php } ?>
		<?php if ($optionSearch === "conversation") {?>
		<option value="conversation" <?php echo "selected"; ?>>Hội thoại</option>
		<?php }else {?>
		<option value="conversation">Hội thoại</option> 
		<?php } ?>
		<?php if ($optionSearch === "video") {?>
		<option value="video" <?php echo "selected"; ?>>Video</option>
		<?php }else {?>
		<option value="video">Video</option> 
		<?php } ?>	
		<?php if ($optionSearch === "grammar") {?>
		<option value="grammar" <?php echo "selected"; ?>>Ngữ pháp</option>
		<?php }else {?>
		<option value="grammar">Ngữ pháp</option> 
		<?php } ?>		
		<?php if ($optionSearch === "specialized") {?>
		<option value="specialized" <?php echo "selected"; ?>>Tiếng Nhật chuyên ngành</option>
		<?php }else {?>
		<option value="specialized">Tiếng Nhật chuyên ngành</option> 
		<?php } ?>							
		<?php }else {?>
		<option value="sentence">Câu ví dụ</option>
		<option value="conversation">Hội thoại</option>
		<option value="video">Video</option>
		<option value="grammar">Ngữ pháp</option>
		<option value="specialized">Tiếng Nhật chuyên ngành</option>
		<?php } ?>
	</select>
	<input type="submit" name="btnSearch" id="btnSearch" value="Search">
	</form>		
	<br>
	<br>
</div>	