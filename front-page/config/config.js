export default {
    singular: true,
    plugins: [
        [
            'umi-plugin-react', {
                antd: true,
                dva: true,
            }
        ]
    ],
    routes: [{
        path: '/',
        component: './Search'
    }],
    proxy: {
        '/search.php': {
            target: 'http://localhost:8080'
        }
    }
}