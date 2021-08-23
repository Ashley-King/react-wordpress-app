import React from 'react';
import ReactDOM from 'react-dom';
import Hello from './components/Hello'
import './index.css';


const App = ({settings}) => (
  <div className="App" style={{borderColor: settings.color}}>
    <Hello name={settings.name}/>
  </div>
)

const targets = document.querySelectorAll('.erw-root');
Array.prototype.forEach.call(targets, target => {
  const id = target.dataset.id;
  const settings = window.erwSettings[id];
  ReactDOM.render(<App settings={settings} />, target)
});





