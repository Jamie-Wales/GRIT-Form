const path = require('path');

module.exports = {
    entry: './public/scripts/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'public/src')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                }
            }
        ]
    }
}