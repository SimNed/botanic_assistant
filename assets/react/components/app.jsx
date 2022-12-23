import React from 'react';
import Header from './header.jsx';
import SvgCanvas from './svg_canvas.jsx';

const App = () => {
  return (
    <div id="app-wrapper">
      <Header/>  
      <main>
        <h1>Botanic assistant</h1>
        <SvgCanvas/>
      </main>
    </div>
  );
};

export default App;