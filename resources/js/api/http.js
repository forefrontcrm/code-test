function mockCall(returnData) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(returnData)
        }, 200)
    })
}

export const http = {
    get(url, returnData) {
        // This console log is here to mimic the Network tab
        console.log('Mock get request to ' + url)
        return mockCall(returnData)
    },
    post(url, payload, returnData) {
        // These console log is here to mimic the Network tab
        console.log('Mock post request to ' + url)
        console.log('with payload', payload)
        return mockCall(returnData)
    },
    put(url, payload, returnData) {
        // These console log is here to mimic the Network tab
        console.log('Mock put request to ' + url)
        console.log('with payload', payload)
        return mockCall(returnData)
    },
    destroy(url, returnData) {
        // This console log is here to mimic the Network tab
        console.log('Mock delete request to ' + url)
        return mockCall(returnData)
    },
}
