function changePlaceholder(){
		var x = document.getElementById("box-select").selectedIndex;
		var option = document.getElementsByTagName("option")[x].value;
		if (option === "sentence") {
			document.getElementById("txtsearch").placeholder="Hãy nhập bằng Hiragana hoặc Romaji ...";			
		};
		if (option === "conversation") {
			document.getElementById("txtsearch").placeholder="Hãy nhập tiêu đề hội thoại ...";			
		};
		if (option === "video") {
			document.getElementById("txtsearch").placeholder="Hãy nhập tiêu đề video ...";			
		};
		if (option === "grammar") {
			document.getElementById("txtsearch").placeholder="Hãy nhập ngữ pháp bạn muốn tìm ...";			
		};
		if (option === "specialized") {
			document.getElementById("txtsearch").placeholder="Hãy nhập một từ bằng Hiragana hoặc Romaji ...";			
		};				
	}