var textslide = 1;
$(
    function ()
    {
        $("#mainimage").elevateZoom({
            scrollZoom : false
        });
    }
)
function moveright()
{
    if(textslide == 1)
    {
        textslide = 2;
        $("#text1").hide(1500);
        $("#text2").show(1500);
    }
    else if(textslide == 2)
    {
        textslide = 3;
        $("#text2").hide(2500);
        $("#text3").show(2500);
    }
    else if(textslide == 3)
    {
        textslide =1;
        $("#text3").hide(2500);
        $("#text1").show(2500);
    }
}
function moveleft()
{
    if(textslide == 1)
    {
        textslide = 3;
       $("#text1").hide(1500);
        $("#text3").show(1500);
    }
    else if(textslide == 2)
    {
        textslide = 1;
        $("#text2").hide(1500);
        $("#text1").show(1500);
    }
    else if(textslide == 3)
    {
        textslide =2;
        $("#text3").hide(1500);
        $("#text2").show(1500);
    }
}
function hidelogin()
{
    document.getElementById("button2").style.display = 'none';
    document.getElementById("passwordlogin").style.display = 'none';
    if(document.getElementById("emaillogin").value==""){}else
        {
           document.getElementById("passwordlogin").style.display = 'block';
           document.getElementById("passwordlogin").style.margin = 'auto auto';
           setTimeout(function(){$( "#passerror" ).effect('shake');},20);
        }
}
function checkemail()
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(document.getElementById("emaillogin").value))
        {
            document.getElementById("emaillogin").focus();
            document.getElementById("emailerror").style.display='block';
            setTimeout(function(){$( "#emailerror" ).effect('shake');},20);
            return false;
        }
    else
        {
            document.getElementById("button2").style.display = 'block';
            document.getElementById("button1").style.display = 'none';
            document.getElementById("passwordlogin").style.display = 'block';
            document.getElementById("passwordlogin").style.margin = 'auto auto';
            document.getElementById("passwordlogin").style.border = 'none';
            document.getElementById("passwordlogin").focus();
        }
}
function hideerrors()
{
    if(document.getElementById("passwordlogin").value=="") //check if the password field is empty
        {
           if(event.keyCode == 13) //If enter is pressed
            {
                $("#button1").click(); //click the first button
            }
        }
    else //if password field is not empty
    {
        if(event.keyCode == 13) //if enter is pressed
        {
            $("#button2").click(); //click the second button
        }
    }
    
    document.getElementById("emailerror").style.display='none'; //hide error message
    $(document).ready(function() { //when the document is loaded
    $(window).keydown(function(event){ //when any key is pressed
    if(event.keyCode == 13) { //if the key was enter
      event.preventDefault(); //stop it from submitting form
      return false;
    }
  });
});
}

function hiding()
{
    $('#new2').hide();
    $('#top2').hide();
}
function newright()
{
    var query = $('#new1');
    var isVisible = query.is(':visible');
    if(isVisible === true)
    {
        $('#new1').hide('slide', {direction: 'right'}, 1000);
        setTimeout(function(){$('#new2').show('slide', {direction: 'left'}, 1000);}, 950);
    }
    else
    {
        $('#new2').hide('slide', {direction: 'right'}, 1000);
        setTimeout(function(){$('#new1').show('slide', {direction: 'left'}, 1000);}, 950);
    }
}
function newleft()
{
    var query = $('#new2');
    var isVisible = query.is(':visible');
    if(isVisible === true)
    {
        $('#new2').hide('slide', {direction: 'left'}, 1000);
        setTimeout(function(){$('#new1').show('slide', {direction: 'right'}, 1000);}, 950);
    }
    else
    {
       $('#new1').hide('slide', {direction: 'left'}, 1000);
        setTimeout(function(){$('#new2').show('slide', {direction: 'right'}, 1000);}, 950); 
    }
}
function topright()
{
    var query = $('#top1');
    var isVisible = query.is(':visible');
    if(isVisible === true)
    {
        $('#top1').hide('slide', {direction: 'right'}, 1000);
        setTimeout(function(){$('#top2').show('slide', {direction: 'left'}, 1000);}, 950);
    }
    else
    {
        $('#top2').hide('slide', {direction: 'right'}, 1000);
        setTimeout(function(){$('#top1').show('slide', {direction: 'left'}, 1000);}, 950);
    }
}
function topleft()
{
    var query = $('#top2');
    var isVisible = query.is(':visible');
    if(isVisible === true)
    {
        $('#top2').hide('slide', {direction: 'left'}, 1000);
        setTimeout(function(){$('#top1').show('slide', {direction: 'right'}, 1000);}, 950);
    }
    else
    {
       $('#top1').hide('slide', {direction: 'left'}, 1000);
        setTimeout(function(){$('#top2').show('slide', {direction: 'right'}, 1000);}, 950); 
    }
}
function clearsearch()
{
    if ($('#search').length > 0) { //checks if the search field has any characters
        $('#search').val(''); //clears search field
    }
}
function language()
{
    var lang = document.getElementById("language"); //store the drop down inside of variable lang
    if(lang.options[lang.selectedIndex].value == "English")   //check if English is selected in drop down
    alert("You have chosen English");                         //alert the user that they have selected English
    if(lang.options[lang.selectedIndex].value == "Spanish")   //check if Spanish is selected in drop down
    alert("Usted ha elegido Español");                        //alert the user that they have selected Spanish
    if(lang.options[lang.selectedIndex].value == "German")    //check if German is selected in drop down
    alert("Sie haben Deutsch gewählt");                       //alert the user that they have selected German
    if(lang.options[lang.selectedIndex].value == "French")    //check if French is selected in drop down
    alert("Vous avez choisi le français");                    //alert the user that they have selected French
}
function category()
{
    alert("TEST");
    var lang = document.getElementById("categoryselect");
    lang.options[lang.selectedIndex].value
    var javascriptVariable = "John";
    window.location.href = "myphpfile.php?name=" + javascriptVariable;
}
function closewelc()
{
    $('#loggedin').hide('slide', {direction: 'down'}, 1000);
}
function imageselect1()
{
    $('#one').css("background-image", "url(./html/images/banner.jpg)");
    $('#bar1').addClass('currentimage');
    $('#bar2').removeClass('currentimage');
    $('#bar3').removeClass('currentimage');
}
function imageselect2()
{
    $('#one').css("background-image", "url(./html/images/bannerz.jpg)");
    $('#bar2').addClass('currentimage');
    $('#bar1').removeClass('currentimage');
    $('#bar3').removeClass('currentimage');
}
function imageselect3()
{
    $('#one').css("background-image", "url(./html/images/bannerzz.jpg)");
    $('#bar3').addClass('currentimage');
    $('#bar2').removeClass('currentimage');
    $('#bar1').removeClass('currentimage');
}
function editName(t)
{
    document.getElementById(t).removeAttribute('readonly');
    document.getElementById(t).style.border = "1px solid black";
    document.getElementById(t).style["background-color"] = "white";
    var btnIDnum = t.substr(t.length - 1);
    var btnID = "admin" + btnIDnum;
    document.getElementById(btnID).style.display = "inline-block";
}
function unfocusName(t)
{
    setTimeout(function(){
        document.getElementById(t).readOnly = true;
        document.getElementById(t).style.border = "none";
        document.getElementById(t).style["background-color"] = "transparent";
        var btnIDnum = t.substr(t.length - 1);
        var btnID = "admin" + btnIDnum;
        document.getElementById(btnID).style.display = "none";
    }, 150);
}
function editURL(t,url)
{
    document.getElementById(t).removeAttribute('readonly');
    document.getElementById(t).style.border = "1px solid black";
    document.getElementById(t).style["background-color"] = "white";
    var btnIDnum = t.substr(t.length - 1);
    var btnID = "urlbtn" + btnIDnum;
    document.getElementById(btnID).style.display = "inline-block";
    document.getElementById(t).value=url;
}
function unfocusURL(t)
{
    setTimeout(function(){
        document.getElementById(t).readOnly = true;
        document.getElementById(t).style.border = "none";
        document.getElementById(t).style["background-color"] = "transparent";
        var btnIDnum = t.substr(t.length - 1);
        var btnID = "urlbtn" + btnIDnum;
        document.getElementById(btnID).style.display = "none";
    }, 150);
}
function checkpw()
{
    if(document.getElementById("newpw").value==document.getElementById("newpwconfirm").value)
    {
        document.getElementById("newpw").style.border="none";
        document.getElementById("newpw").style.border="1px solid green";
        document.getElementById("newpwconfirm").style.border="none";
        document.getElementById("newpwconfirm").style.border="1px solid green";
    }
}

function plus()
{
    var textBox = document.getElementById("jsqty");
    var a = textBox.value;
    a++;
    textBox.value = a;
}
function minus() {
    var textBox = document.getElementById("jsqty");
    var a = textBox.value;
    if (a == 0)
    {
        a = 1;
    }
    a--;
    textBox.value = a;
}
function image(src)
{
    $(".zoomWindow").css({
        "background-image":"url("+src+")",
    });
    $(".zoomWindow").css("background-size","contain!important");
    document.getElementById("mainimage").src = src;
}

function updateDel(a)
{
    if(a.value == 1)
    {
        document.getElementById("del1").style.display = "inline-block";
        document.getElementById("del2").style.display = "none";
        document.getElementById("del3").style.display = "none";
    }
    else if(a.value == 2)
    {
        document.getElementById("del2").style.display = "inline-block";
        document.getElementById("del1").style.display = "none";
        document.getElementById("del3").style.display = "none";
    }
    else if(a.value == 3)
    {
        document.getElementById("del3").style.display = "inline-block";
        document.getElementById("del1").style.display = "none";
        document.getElementById("del2").style.display = "none";
    }
}
function changeAddress()
{
    document.getElementById("changeAddr").style.display = "none";
    document.getElementById("addresses").style.display = "block";
}
function updateAddress()
{
    document.getElementById("changeAddr").style.display = "block";
    document.getElementById("addresses").style.display = "none";
}

