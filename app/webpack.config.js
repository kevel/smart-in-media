const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  mode: 'development',
  entry: './src/index.js',
  output: {
    filename: 'index.js',
    path: path.resolve(__dirname, 'dist'),
  },
  devServer: {
    host: '0.0.0.0',
    port: 3000,
    useLocalIp: true,
  },
  plugins: [
    new HtmlWebpackPlugin({
      title: 'Vending Machine',
    }),
  ],
};
