import React, { useEffect, useRef, useState } from 'react';



const SvgCanvas = () => {

  const svgCanvasRef = useRef(null);

  useEffect(() => {
    if(!svgCanvasRef)
      return;
    
    const svgCanvas = svgCanvasRef.current;

    var originPositionPoints;
    var tempPolygon;

    function InitTempPolygon(e){
      originPositionPoints = new DOMPoint(e.clientX, e.clientY);
      tempPolygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
    }

    function DrawingTempPolygon(e){
      let coordinates = [
        originPositionPoints.x, originPositionPoints.y,
        e.clientX, originPositionPoints.y,
        e.clientX, e.clientY,
        originPositionPoints.x, e.clientY
      ]
      tempPolygon.setAttribute('points', coordinates.toString());
      tempPolygon.setAttribute("style", "stroke:black; stroke-width:1;");
    }

    svgCanvas.addEventListener('mousedown', (e) => {
      InitTempPolygon(e);
      svgCanvas.addEventListener('mousemove', DrawingTempPolygon)
    })

    svgCanvas.addEventListener('mouseup', (e) => {
      svgCanvas.removeEventListener('mousemove', DrawingTempPolygon)
      console.log('mouse up');
    })

}, []);


    return (
        <svg ref={svgCanvasRef} id="svg-canvas"></svg>
    );
};

export default SvgCanvas;















/*
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <style>
        svg {
          cursor: crosshair;
          border: 1px solid #000000;
        }

        polygon {
          fill: none;
          stroke: #000000;
          stroke-width: 2;
        }
    </style>

    <body>
        <svg id="svg" width="800" height="500"></svg>
    </body>

    <script type="text/javascript">
  
      const svg = document.querySelector('#svg');

      svg.polygons = [];
            
      svg.addEventListener('mousedown', (event) => {

        svg.defaultPolygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
        svg.originPoint = new DOMPointReadOnly(event.clientX, event.clientY);
        
        svg.appendChild(svg.defaultPolygon);

        svg.addEventListener('mousemove', DrawDefaultPolygon);
      
      });

      svg.addEventListener('mouseup', PrintPolygon);
      
      function DrawDefaultPolygon(event) {

        let defaultPolygon = event.currentTarget.defaultPolygon;
        let originPoint = event.currentTarget.originPoint;
        
        let coordinates = [
          originPoint.x, originPoint.y,
          event.clientX, originPoint.y,
          event.clientX, event.clientY,
          originPoint.x, event.clientY
        ]

        defaultPolygon.setAttribute('points', coordinates.toString());
      }

      function PrintPolygon(event) {
        svg.removeEventListener('mousemove', DrawDefaultPolygon);
        svg.polygons.push(event.currentTarget.defaultPolygon);
      }

    </script>
</html>
*/