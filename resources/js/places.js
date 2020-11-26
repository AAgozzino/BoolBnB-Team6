var places = require('places.js');

const options = {
    appId: 'plMMPUODJ2PK',
    apiKey: '0337776886165fd5d9d75984ac961fa9',
    container: '#address-input',
    // aroundRadius: 20000
  };
  places(options);

var placesAutocomplete = places({
    appId: 'plMMPUODJ2PK',
    apiKey: '0337776886165fd5d9d75984ac961fa9',
    container: document.querySelector('#address-input')
});
  
  placesAutocomplete.on('change', e => console.log(e.latlng));