const cookieToObject = async (cookieString) => {
    return new Promise((resolve, reject) => {
        try {
            if(!cookieString){
                resolve({})
            }
            let cookies = cookieString.split("; ");
            let newCookies = [];
            cookies.forEach(cookie => {
                cookie = cookie.split("=");
                cookie[0]='"'+cookie[0]+'"';
                cookie[1]='"'+cookie[1]+'"';
                cookie=cookie[0]+":"+cookie[1];
                newCookies.push(cookie);
            })
            let cookiesJSON="";
            newCookies.map(cookie => {
                cookiesJSON += cookie;
                cookiesJSON += ", ";
            })
            cookiesJSON=cookiesJSON.substring(0, cookiesJSON.length - 2);
            cookiesJSON = "{"+cookiesJSON+"}";
            resolve(JSON.parse(cookiesJSON));
        } catch (error) {
            reject(`Failed to set cookie: ${error}`);
        }
    });
};

const registerVisit = async(pageName) => {
    let visits = sessionStorage.getItem(pageName);
    if (visits) {
        sessionStorage.setItem(pageName, (parseInt(visits)+1).toString())
    }
    else{
        sessionStorage.setItem(pageName, "1");
    }
    if (!getCookie(pageName)) {
        await setCookie(pageName, "1", 10);
    }
    else{
        await updateCookieCount(pageName);
    }
};

const setCookie = async (name, value, expirationDays) => {
    return new Promise((resolve, reject) => {
        try {
            let date = new Date();
            date.setDate(date.getDate() + expirationDays);
            document.cookie = `${name}=${value}; path=/; expires=${date.toUTCString()}`;
            resolve(`Cookie "${name}" set successfully.`);
        } catch (error) {
            reject(`Failed to set cookie: ${error}`);
        }
    });
};

const getCookie = (name) => {
    let cookieName = name + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(cookieName) === 0) {
            return c.substring(cookieName.length, c.length);
        }
    }
    return "";
};


const updateCookieCount = async (name) => {
    let cookieObject = await cookieToObject(document.cookie.toString());
    cookieObject[name]=(parseInt(cookieObject[name])+1).toString();
    await setCookie(name, cookieObject[name], 10);
};

(async () => {
    await registerVisit(window.location.pathname);
})();

export {cookieToObject};
