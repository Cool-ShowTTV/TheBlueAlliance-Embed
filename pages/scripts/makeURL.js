// make button run a function
async function createUrl(){
    frcNumber = document.getElementById("frcNumber").value;
    fontName = document.getElementById("fontName").value;
    color = document.getElementById("txtColor").value;
    github = document.getElementById("github").checked;
    doubleSpace = document.getElementById("doubleSpace").checked;
    
    fontName = encodeURIComponent(fontName);
    color = color.replace("#", "");
    console.log("createUrl");
    console.log({'frcNumber': frcNumber,'fontName': fontName,'color': color,'github': github,'doubleSpace': doubleSpace});
        
    // copy url to clipboard
    var url = document.location.origin + "/?font=" + fontName + "&num=" + frcNumber + "&color=" + color + "&doubleSpace=" + doubleSpace;
    document.getElementById("example").src = url;
    if(github){url = `![events](${url}&github=true)`}
    console.log(url);
    copyTextToClipboard(url);
    setPage("examplePage");
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