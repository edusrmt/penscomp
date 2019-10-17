const path = require('path');

module.exports = {
    entry: './src/main.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'app.js'
    },
    mode: 'development',
    resolve: {
        modules: [
            path.resolve('./node_modules'),
            path.resolve('./components/objects'),
            path.resolve('./components/scenes'),
            path.resolve('./utils'),
            path.resolve('./src')
        ],
        extensions: [
            '.js',
            '.jsx'
        ]
    },
    target: 'web',
    externals: {
        child_process: 'jsdom',
        fs: 'jsdom',
        fs: 'pn',
        fs: 'request',
        net: 'forever-agent',
        net: 'tough-cookie',
        net: 'tunnel-agent',
        tls: 'tunnel-agent',
        tls: 'forever-agent',
    }
};
