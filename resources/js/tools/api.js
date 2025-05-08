import axios from 'axios'

const api = axios.create({
    baseURL: `http://localhost:8000/api/v1`,
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
})

/**
 * Triggers a HTTP request.
 * @param {'get' | 'post' | 'put' | 'delete'} type 
 * @param {{ url: string, data?: any, options?: any }} params 
 * @param {Promise<any>} callback
 * @returns 
 */
const HttpRequest = async (type, params, callback) => {
    try {

        const response = { value: null }
        if (type === 'get' || type === 'delete') {
            response.value = await callback(params.url, params.options)
        } else {
            response.value = await callback(params.url, params.data, params.options)
        }
        return response.value.data
    } catch (error) {
        console.error(`Error with ${type.toUpperCase()} ${url} request:`, error)
        throw error
    }
}

const GET = async (url, options) => await HttpRequest('get', { url, options }, api.get)
const POST = async (url, data, options) => await HttpRequest('post', { url, data, options }, api.post)
const PUT = async (url, data, options) => await HttpRequest('put', { url, data, options }, api.put)
const DELETE = async (url, options) => await HttpRequest('delete', { url, options }, api.delete)

export default { GET, POST, PUT, DELETE }
