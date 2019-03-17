class Canvas {

  constructor() {
    this.canvas = document.getElementById("canvas");
    this.context = this.canvas.getContext("2d");
    this.test = false;

  }
  startDrawing() {

    this.clearCanvas();
    var that = this;
    this.canvas.addEventListener("mousedown", function(e) {
      document.getElementById("station-confirmer-btn").style.display = "initial";
      document.getElementById("canvas").style.borderColor = "#5CB85C";

      that.test = true;
      that.context.beginPath();
      that.context.moveTo(e.offsetX, e.offsetY);
      that.canvas.addEventListener("mousemove", function(event) {

        if (that.test === true) {
          var x = event.offsetX;
          var y = event.offsetY;
          that.context.lineTo(x, y);
          that.context.stroke();
        }
      });

    });
    this.canvas.addEventListener("mouseup", function() {

      that.test = false;
    });
  }
  startTouching() {
    var that = this;
    this.canvas.addEventListener("touchstart", function(e) {
      var rect = that.canvas.getBoundingClientRect();
      var touchX = e.touches[0].clientX - rect.left;
      var touchY = e.touches[0].clientY - rect.top;
      document.getElementById("station-confirmer-btn").style.display = "initial";
      document.getElementById("canvas").style.borderColor = "#5CB85C";
      that.test = true;
      that.context.beginPath();
      that.context.moveTo(touchX, touchY);

      that.canvas.addEventListener("touchmove", that.draw.bind(that));
    });
    this.canvas.addEventListener("touchend", function() {
      that.test = false;
    });
  }

  /*    draw() {
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
      var rect = this.canvas.getBoundingClientRect();
      var x = event.touches[0].clientX - rect.left;
      var y = event.touches[0].clientY - rect.top;
      this.context.lineTo(x, y);
      this.context.stroke();
    }
    event.preventDefault();
  }
  clearCanvas() {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  }
}
