function SurveyCustom(){ 
	this.arrQ = [];
	this.arrA = [];
}
	SurveyCustom.prototype.getQ = function(elem){
		var qNum = elem + 1;
		document.write(qNum + ") " + this.arrQ[elem] + "?<br/>");
	};
	SurveyCustom.prototype.getA = function(row, col){
		document.write(this.arrA[row] + "<br/><br/>");
	};
	
	
	SurveyCustom.prototype.save = function() {
		localStorage.setItem("QuestAns", JSON.stringify(SurveyInput));
	};

			
	SurveyCustom.prototype.load = function() {
		this.arrQ = JSON.parse(localStorage.getItem("Quest"));
        if (this.arrQ === null) {
            this.arrQ = []
        }
		
		this.arrA = JSON.parse(localStorage.getItem("Quest"));
        if (this.arrA === null) {
            this.arrA = []
        }
	};
	
	SurveyCustom.prototype.clearLocal = function(){
		this.arrQ = [];
		this.arrA = [];
		
		this.save();
	};




