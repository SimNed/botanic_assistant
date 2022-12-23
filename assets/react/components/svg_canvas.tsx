import React, { useEffect, useRef, useState } from 'react';



const SvgCanvas = () => {

  const svgCanvasRef = useRef(null);

  useEffect(() => {
    if(!svgCanvasRef)
      return;
    
    const svgCanvas = svgCanvasRef.current;

    function InitTempPolygon(e){
      svgCanvas.originPositionPoints = new DOMPointReadOnly(e.clientX, e.clientY);
      svgCanvas.tempPolygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
      console.log('InitRecognize');
    }

    function DrawingTempPolygon(e){
      
      let coordinates = [
        svgCanvas.originPositionPoints.x, svgCanvas.originPositionPoints.y,
        e.clientX, svgCanvas.originPositionPoints.y,
        e.clientX, e.clientY,
        svgCanvas.originPositionPoints.x, e.clientY
      ]

      console.log('MoveRecognize');
      
      svgCanvas.tempPolygon.setAttribute('points', coordinates.toString());
      svgCanvas.tempPolygon.setAttribute("style", "stroke:black; stroke-width:1;");
    }

    svgCanvas.addEventListener('mousedown', (e) => {
      svgCanvas.addEventListener('mousedown', DrawingTempPolygon);
      InitTempPolygon(e);
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