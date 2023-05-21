const apiEndpoint = 'http://localhost:90';

const getHealthCheckUrl = () => {
    return apiEndpoint + '/healthCheck'
}

export default getHealthCheckUrl