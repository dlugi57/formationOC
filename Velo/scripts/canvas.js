//https://www.w3schools.com/graphics/canvas_coordinates.asp
//sprobuj to zrobic z jakims wylacznikiem

//probleme z removeEventListener i z bezimienna funkcja

class Canvas {
  //canvas;
  //context;
  //canvas = document.getElementById("canvas");
  //context = this.canvas.getContext("2d");
  //test = false;
  constructor(){
    this.canvas = document.getElementById("canvas");
    this.context = this.canvas.getContext("2d");
    this.test = false;

  }
  startDrawing() {
    //  this.canvas = document.getElementById("canvas");
    //this.context = this.canvas.getContext("2d");
    this.clearCanvas();
    var that = this;
    this.canvas.addEventListener("mousedown", function(e) {
document.getElementById("station-confirmer-btn").style.display = "initial";
document.getElementById("canvas").style.borderColor = "#5CB85C";


      that.test = true;
      that.context.beginPath();
      that.context.moveTo(e.offsetX, e.offsetY);
      console.log(e.offsetX);

      //that.canvas.addEventListener("mousemove", that.draw.bind(that));

that.canvas.addEventListener("mousemove", function(event){

  if (that.test === true) {
    console.log("przeciagam");
    //var that = this;
    var x = event.offsetX;
    var y = event.offsetY;
  //  this.context.strokeStyle = "black";
    that.context.lineTo(x, y);
    //this.context.lineWidth = "1";
    that.context.stroke();
  }
});







      //that.draws();
      //that.stopDrawing();

      //  console.log("kliklem");
    });
    this.canvas.addEventListener("mouseup", function() {
      console.log("podniesiony");
      that.test = false;
      //that.context.restore();
      //  that.canvas.removeEventListener("mousemove", that.draw.bind(that));
    });
  }
  startTouching() {
    var that = this;
    this.canvas.addEventListener("touchstart", function(e) {
      var rect = that.canvas.getBoundingClientRect();
      var touchX = e.touches[0].clientX - rect.left;
      var touchY = e.touches[0].clientY - rect.top;
      //  var touchX = e.touches[0].pageX;
      //  var touchY = e.touches[0].pageY;
      document.getElementById("station-confirmer-btn").style.display = "initial";
      document.getElementById("canvas").style.borderColor = "#5CB85C";

      console.log(touchX);

      that.test = true;
      that.context.beginPath();
      that.context.moveTo(touchX, touchY);

      that.canvas.addEventListener("touchmove", that.draw.bind(that));
      //that.draws();
      //that.stopDrawing();

      //  console.log("kliklem");
    });
    this.canvas.addEventListener("touchend", function() {
      console.log("podniesiony");
      that.test = false;
      //that.context.restore();
      //  that.canvas.removeEventListener("mousemove", that.draw.bind(that));
    });
  }



  /*draws() {
    var that = this;
    this.canvas.addEventListener("mousemove", function() {
      console.log("przeciagam");
      var x = event.offsetX;
      var y = event.offsetY;
      //that.context.strokeStyle =
      that.context.lineTo(x, y);
      that.context.lineWidth = "1";
      that.context.stroke();

    });


  }*/
/*

  draw() {
    if (this.test === true) {
      console.log("przeciagam");
      //var that = this;
      var x = event.offsetX;
      var y = event.offsetY;
    //  this.context.strokeStyle = "black";
      this.context.lineTo(x, y);
      //this.context.lineWidth = "1";
      this.context.stroke();
    }




  }*/
  draw() {
    if (this.test === true) {
      console.log("przeciagam");
      //var that = this;
      //solution found on w3schools
      var rect = this.canvas.getBoundingClientRect();
      var x = event.touches[0].clientX - rect.left;
      var y = event.touches[0].clientY - rect.top;
      //  var x = event.touches[0].pageX;
      //  var y = event.touches[0].pageY;

      this.context.lineTo(x, y);
    //  this.context.strokeStyle = "black";
    //  this.context.lineWidth = "1";
      this.context.stroke();
    }
    event.preventDefault();
  }
  clearCanvas(){
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  }
}
