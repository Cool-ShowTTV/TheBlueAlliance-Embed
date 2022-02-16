// make button run a function
function createUrl(){
    console.log("createUrl");
}



// ignore just saving this for later use
// function getParamsFromUrl() {
//     url = decodeURI(document.location.href);
//     if (typeof url === 'string') {
//         let params = url.split('?');
//         let eachParamsArr = params[1].split('&');
//         let obj = {};
//         if (eachParamsArr && eachParamsArr.length) {
//             eachParamsArr.map(param => {
//                 let keyValuePair = param.split('=')
//                 let key = keyValuePair[0];
//                 let value = keyValuePair[1];
//                 obj[key] = decodeURIComponent(value);
//             })
//         }
//         return obj;
//     }
// } console.log(getParamsFromUrl())