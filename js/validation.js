// JavaScript Document
function vVoid(id)
{
	var txtBox=document.getElementById(id);
	txtBox.value=txtBox.value.replace(/[^\d*]/,'');
}
function vInt(id)
{
	var txtBox=document.getElementById(id);
	txtBox.value=txtBox.value.replace(/[^\d*]/,'');
}