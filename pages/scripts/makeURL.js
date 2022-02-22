// make button run a function
async function createUrl(){
    frcNumber = document.getElementById("frcNumber").value;
    fontName = document.getElementById("fontName").value;
    color = document.getElementById("txtColor").value;
    embedType = document.getElementById("embedType").value;
    doubleSpace = document.getElementById("doubleSpace").checked;
    
    fontName = encodeURIComponent(fontName);
    color = color.replace("#", "");
    console.log("createUrl");
    console.log({'frcNumber': frcNumber,'fontName': fontName,'color': color,'embedType': embedType,'doubleSpace': doubleSpace});
        
    // copy url to clipboard
    var url = document.location.origin + "/embed.svg?font=" + fontName + "&num=" + frcNumber + "&color=" + color + "&doubleSpace=" + doubleSpace;
    document.getElementById("example").src = url;
    if(embedType == 'github'){url = `![events](${url}&github=true)`}
    else if(embedType == 'githubWLink'){url = `[![events](${url}&github=true)](https://www.thebluealliance.com/team/${frcNumber})`}
    else{url = `${url}`}
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