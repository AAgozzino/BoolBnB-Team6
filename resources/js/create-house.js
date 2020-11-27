// AUTOCOMPILAZIONE FORM

// (function() {
//     var placesAutocomplete = places({
//       appId: '<YOUR_PLACES_APP_ID>',
//       apiKey: '<YOUR_PLACES_API_KEY>',
//       container: document.querySelector('#form-address'),
//       templates: {
//         value: function(suggestion) {
//           return suggestion.name;
//         }
//       }
//     }).configure({
//       type: 'address'
//     });
//     placesAutocomplete.on('change', function resultSelected(e) {
//       document.querySelector('#form-address2').value = e.suggestion.administrative  '';
//       document.querySelector('#form-city').value = e.suggestion.city  '';
//       document.querySelector('#form-zip').value = e.suggestion.postcode || '';
//     });
//   })();