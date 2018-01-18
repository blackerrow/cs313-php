//function changeColor(){
//    var newColor = document.getElementById('newColorName').value;
//    var divOne = document.getElementById('divOne');
////    console.log(newColor);
//    divOne.style.backgroundColor = newColor;
////  divOne.style.backgroundColor = 'black';
//}
function beenClicked(){
    alert("I've Been Clicked!");
}

$(document).ready(function(){
//    var newColor = $("#newColorName").val();
    $("#changeColor").click(function(){
    $("#divOne").css("background-color", $("#newColorName").val()
    );
//    console.log(newColor);
    });
});
