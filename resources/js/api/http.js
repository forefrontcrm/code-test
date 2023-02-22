function mockCall(returnData) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(returnData)
        }, 100)
    })
}

export const http = {
    get(url, returnData) {
        // This console log is here to mimic the Network tab
        console.log('Mock get request to ' + url)

        console.log('Mock response', returnData)
        return mockCall(returnData)
    },
    post(url, payload, returnData) {
        // These console log is here to mimic the Network tab
        console.log('Mock post request to ' + url)
        console.log('Mock payload', payload)

        // Need to add an id to returnData because the backend would add one
        returnData.id = Math.ceil(Math.random() * (100 - 10) + 10);

        console.log('Mock response', returnData)
        return mockCall(returnData)
    },
    put(url, payload, returnData) {
        // These console log is here to mimic the Network tab
        console.log('Mock put request to ' + url)
        console.log('Mock payload', payload)

        console.log('Mock response', returnData)
        return mockCall(returnData)
    },
    destroy(url, returnData) {
        // This console log is here to mimic the Network tab
        console.log('Mock delete request to ' + url)

        console.log('Mock response', returnData)
        return mockCall(returnData)
    },
}
