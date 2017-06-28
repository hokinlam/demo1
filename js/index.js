/**
 * Created by zhjl on 2017/4/15.
 */

//slide
var box = document.getElementById('box');
var inner = box.children[0];
var ul = inner.children[0];
var ol = inner.children[1];
var span = inner.children[2];
var spanArr = inner.children[2].children;
var imgWidth = inner.offsetWidth;

var lastLi = ul.children[0].cloneNode(true);
ul.appendChild(lastLi);

for(var i=0;i<ul.children.length-1;i++) {
    var li = document.createElement('li');
    li.innerHTML = i+1;
    ol.appendChild(li);
};

var olLi = ol.children;
var ulLi = ul.children;
olLi[0].className = 'current';


for (var j = 0; j < ol.children.length; j++) {
    ol.children[j].index = j;
    ol.children[j].onmouseover = function() {
        for(var k = 0;k < ol.children.length;k++){
            ol.children[k].className = '';
        }
        this.className = 'current';
        ad = this.index;
        square = this.index;
        animate(ul,-imgWidth*this.index);
    }
};

var timer = setInterval(autoPlay,5000);

var ad = 0;
var square = 0;

function autoPlay() {
    ad ++ ;


    // ad==0代表第一副，ad++，ad==5的时候，移动至新创建的li，
    // 这时显示无缝滚动，ad>5时让他闪现至第一副图，再把ad=1，让他移动至第二幅
    if(ad > olLi.length){
        ul.style.left = 0;
        ad = 1;

    }
    animate(ul,-imgWidth*ad);

    // square自增，所有方块的className为空，第square个方块classname为
    // current，当square大于4即大于第5个方块时，square设为0，即第一个方块
    square ++ ;
    if(square>olLi.length-1){
        square = 0;
    }

    for(var w =0;w < olLi.length;w++){
        olLi[w].className='';
    }
    olLi[square].className = "current";


}

box.onmouseover = function() {
    span.style.display = "block";
    clearInterval(timer);
}

box.onmouseout = function() {
    span.style.display = "none";
    timer = setInterval(autoPlay,4000);
}

spanArr[1].onclick = function() {
    autoPlay();
}
spanArr[0].onclick = function() {
    ad--;
    if(ad<0){
        ul.style.left = -(olLi.length)*imgWidth+"px";
        ad = olLi.length - 1;
    }
    animate(ul,-ad*imgWidth);

    square--;
    if(square<0){
        square= olLi.length-1;
    }
    for(var i=0;i<olLi.length;i++){
        olLi[i].className="";
    }
    olLi[square].className ="current";
}

function animate(ele,target){
    clearInterval(ele.timer);
    var speed = target>ele.offsetLeft?10:-10;
    ele.timer = setInterval(function () {
        var val = target - ele.offsetLeft;
        ele.style.left = ele.offsetLeft + speed + "px";
        if(Math.abs(val)<Math.abs(speed)){
            ele.style.left = target + "px";
            clearInterval(ele.timer);
        }
    },10)
}

//tab
var liArr = document.getElementsByClassName("li")[0].children;
var ulArr = document.getElementsByClassName("ul")[0].children;
for (var i = 0 ; i < liArr.length ; i++) {
    liArr[i].index = i;
    liArr[i].onmouseover = function(){
        for(var j = 0 ; j < liArr.length; j++) {
            liArr[j].className = '';
            ulArr[j].className = '';
        }
        this.className = "current";
        ulArr[this.index].className = 'show'
    }
}



