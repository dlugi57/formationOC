//https://www.w3schools.com/graphics/canvas_coordinates.asp
//sprobuj to zrobic z jakims wylacznikiem

//probleme z removeEventListener i z bezimienna funkcja

class Canvas {
  //canvas;
  //context;
  canvas = document.getElementById("canvas");
  context = this.canvas.getContext("2d");
  test = false;
  startDrawing() {
    //  this.canvas = document.getElementById("canvas");
    //this.context = this.canvas.getContext("2d");
    var that = this;
    this.canvas.addEventListener("mousedown", function(e) {

      that.test = true;
      that.context.beginPath();
      that.context.moveTo(e.offsetX, e.offsetY);

      that.canvas.addEventListener("mousemove", that.draw.bind(that));
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
  stopDrawing() {
    var that = this;


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


  draw() {
    if (this.test === true) {
      console.log("przeciagam");
      //var that = this;
      var x = event.offsetX;
      var y = event.offsetY;
      this.context.strokeStyle = "black";
      this.context.lineTo(x, y);
      this.context.lineWidth = "1";
      this.context.stroke();
    }




  }
}
