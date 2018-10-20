// JavaScript Document
function printCaste(selected)
{
	var optionsList;
	//document.getElementById('emptyCaste').style.display='none';
	if(selected=='Hindu')
		optionsList='<select name="caste" class="box" id="caste"><option value="Brahmins" selected>Brahmins</option><option value="Menon" selected>Menon</option><option value="Nair" selected>Nair</option></select>';
	if(selected=='Christian')
		optionsList='<select name="caste" class="box" id="caste"><option value="RC" selected>Roman Catholic</option><option value="Latin" selected>Latin</option></select>';
	if(selected=='Muslim')
		optionsList='<select name="caste" class="box" id="caste"><option value="None" selected>None</option></select>';
	document.getElementById('dispCaste').innerHTML=optionsList;
}