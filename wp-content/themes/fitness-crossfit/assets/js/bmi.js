/************************************************************************************************************
BMI calculator
Copyright (C) October 2005  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com
************************************************************************************************************/
"use strict";	
var useCm = true; 	// Using centimetre for height, false = inch
var useKg = true	// Using kilos for weight, false = pounds
var graphColors = ['#6600CC','#66CC00','#00CCCC','#CC0000'];
var graphLabels = ['Below 18.5: Underweight','18.5 – 24.9: Normal','25.0 – 29.9: Overweight','30 and above: Obese'];
var labelsPerRow = 1;	/* Help labels above graph */

// Don't change anything below this point */

var calculatorObj;
var calculatorGraphObj;
var bmiArray = [0,18.5,25,30,60];	/* BMI VALUES */
var weightDiv = false;
	
function calculateBMI()
{
	var height = document.bmi_calculator.bmi_height.value;
	var weight = document.bmi_calculator.bmi_weight.value;

	var height_measure_in = document.bmi_calculator.height_measure_in.value;
	var weight_measure_in = document.bmi_calculator.weight_measure_in.value;

	height = height.replace(',','.');
	weight = weight.replace(',','.');
	if(!useKg)weight = weight / 2.2;
	if(!useCm)height = height * 2.54;
	
	if(isNaN(height))return;
	if(isNaN(weight))return;
	
	if(height_measure_in == 'feet'){
		height = (height*30.48) / 100;
	
	}
	else{
		height = height / 100;
	}

	if(weight_measure_in == 'pounds'){
		weight = (weight/2.20462);
	}
	else{
		weight = weight;
	}

	//BMI = ( Weight in Kilograms / ( Height in Meters x Height in Meters ) )
	var bmi = weight / (height*height);

	document.getElementById("bmi_results_graph").innerHTML = '<div class="bmi_value"><input type="text" placeholder="Result" value="'+bmi.toFixed(1)+'"></div>';
}
function validateField()
{
	this.value = this.value.replace(/[^0-9,\.]/g,'');
}

function initBmiCalculator()
{
	calculatorObj = document.getElementById('dhtmlgoodies_bmi_calculator');	
	calculatorGraphObj = document.getElementById('bmi_calculator_graph');	
	if(!useCm)document.getElementById('bmi_label_height').innerHTML = 'inches';
	if(!useKg)document.getElementById('bmi_label_weight').innerHTML = 'pounds';
	
	var heightInput = document.getElementById('bmi_height');
	heightInput.onblur = validateField; 
	var widthInput = document.getElementById('bmi_height');
	widthInput.onblur = validateField; 
	
	var labelDiv = document.createElement('DIV');
	labelDiv.className = 'graphLabels';
	//calculatorGraphObj.appendChild(labelDiv);
	for(var no=graphLabels.length-1;no>=0;no--){
		var colorDiv = document.createElement('DIV');
		colorDiv.className='square';
		colorDiv.style.backgroundColor = graphColors[no];
		colorDiv.innerHTML = '<span></span>';
		labelDiv.appendChild(colorDiv);
		
		var labelDivTxt = document.createElement('DIV');
		labelDivTxt.innerHTML = graphLabels[no];
		labelDiv.appendChild(labelDivTxt);
		labelDivTxt.className='label';
		
		if((no+1)%labelsPerRow==0){
			var clearDiv = document.createElement('DIV');
			clearDiv.className='clear';
			labelDiv.appendChild(clearDiv);				
		}		
	}
	var clearDiv = document.createElement('DIV');
	clearDiv.className='clear';
	labelDiv.appendChild(clearDiv);
}
