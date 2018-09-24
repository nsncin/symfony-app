/**
 * Created by NSNCI on 9/20/2018.
 */


    var canvas=document.querySelector('canvas');

    canvas.width=window.innerWidth;
    canvas.height=window.innerHeight;

    var c = canvas.getContext('2d');


/*var x=Math.random() * innerWidth;
var dx=(Math.random() - 0.5) * 10;
var y=Math.random() * innerHeight;
var dy=(Math.random() - 0.5) * 10;
var radius=30;*/

    function Circle(x,y,dx,dy,radius){
        this.x=x;
        this.y=y;
        this.dx=dx;
        this.dy=dy;
        this.radius=radius;

        this.draw=function(){
            c.beginPath();
            c.arc(this.x,this.y,this.radius,0,Math.PI * 2,false);
            c.strokeStyle='blue';
            c.stroke();
            c.fill();
        };

        this.update= function(){
            if(this.x+this.radius > innerWidth || this.x- this.radius < 0){
                this.dx=-this.dx;
            }
            if(this.y+this.radius>innerHeight|| this.y-this.radius<0){
                this.dy=-this.dy;
            }
            this.x+=this.dx;
            this.y+=this. dy;

            this.draw();
        }
    }

    circleArray=[];

    for(var i=0;i<100;i++){
        var radius=30;
        var x=Math.random() * (innerWidth- radius*2) + radius;
        var dx=(Math.random() - 0.5) * 10;
        var y=Math.random() * (innerHeight-radius*2) + radius;
        var dy=(Math.random() - 0.5) * 10;

        circleArray.push(new Circle(x,y,dx,dy,radius))
    }
  //  circle.draw();




    function animate(){
        requestAnimationFrame(animate);
        c.clearRect(0,0,innerWidth,innerHeight);

        for(var i=0;i<circleArray.length;i++){
            circleArray[i].update();
        }

        //circle.update();


    }

    animate();