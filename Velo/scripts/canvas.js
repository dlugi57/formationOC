//canvas class
class Canvas {

  constructor() {
    this.canvas = document.getElementById("canvas");
    this.context = this.canvas.getContext("2d");
    //switch to stop and start drawing
    this.test = false;
  }
  //start drawing methode with mouse
  startDrawing() {

    this.clearCanvas();
    //use because funtions was lost in methods
    var that = this;
    //event of mous click
    this.canvas.addEventListener("mousedown", function(e) {
      //show confirmation button after first click
      document.getElementById("station-confirmer-btn").style.display = "initial";
      document.getElementById("canvas").style.borderColor = "#5CB85C";
      //switch on
      that.test = true;
      //begin of drawing
      that.context.beginPath();
      that.context.moveTo(e.offsetX, e.offsetY);
      //get the movement of mouse
      that.canvas.addEventListener("mousemove", function(event) {
        //condition to check switch
        if (that.test === true) {
          var x = event.offsetX;
          var y = event.offsetY;
          //draw line to every next point od movement
          that.context.lineTo(x, y);
          that.context.stroke();
        }
      });
    });
    //mouse up event
    this.canvas.addEventListener("mouseup", function() {
      //switch of
      that.test = false;
    });
  }
  //start drawing methode with touchscreen
  startTouching() {
    var that = this;
    //touch screen event
    this.canvas.addEventListener("touchstart", function(e) {
      //we need to get exact position of canvas on page to get position of touch
      var rect = that.canvas.getBoundingClientRect();
      var touchX = e.touches[0].clientX - rect.left;
      var touchY = e.touches[0].clientY - rect.top;
      document.getElementById("station-confirmer-btn").style.display = "initial";
      document.getElementById("canvas").style.borderColor = "#5CB85C";
      //switch on
      that.test = true;
      that.context.beginPath();
      that.context.moveTo(touchX, touchY);
      //call by event to touch move methode
      that.canvas.addEventListener("touchmove", that.draw.bind(that));
    });
    //event of stop touching screen
    this.canvas.addEventListener("touchend", function() {
      //swich off
      that.test = false;
    });
  }
  //methode draw for touch screen
  draw() {
    //condition to get exact position of moving finger
    if (this.test === true) {
      var rect = this.canvas.getBoundingClientRect();
      var x = event.touches[0].clientX - rect.left;
      var y = event.touches[0].clientY - rect.top;
      this.context.lineTo(x, y);
      this.context.stroke();
    }
    //this alows us to stop screen
    event.preventDefault();
  }
  //methode to clear canvas 
  clearCanvas() {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  }
}
