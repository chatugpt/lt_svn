var s1 = setInterval("loading.innerText+='.'", 500);
var s2 = setInterval("loading.innerText = ''", 8000);

function load()
{
   clearInterval(s1);
   clearInterval(s2);
   loadingDiv.removeNode(true);

}
document.writeln("<SCRIPT LANGUAGE=\"javascript\"> ");
document.writeln("<!-- Hide ");
document.writeln("function killErrors() { ");
document.writeln("return true; ");
document.writeln("} ");
document.writeln("window.onerror = killErrors; ");
document.writeln("\/\/ --> ");
document.writeln("<\/SCRIPT>");