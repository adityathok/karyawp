'use strict'

const path = require('path')
const autoprefixer = require('autoprefixer')
const miniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = {
  mode: 'production',
  entry: './src/js/main.js',
  output: {
    filename: 'theme.js',
    path: path.resolve(__dirname, 'assets')
  },
  plugins: [    
    new miniCssExtractPlugin({
        filename: 'theme.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(scss)$/,
        use: [
          {
            // Adds CSS to the DOM by injecting a `<style>` tag
            loader: miniCssExtractPlugin.loader
          },
          {
            // Interprets `@import` and `url()` like `import/require()` and will resolve them
            loader: 'css-loader'
          },
          {
            // Loader for webpack to process CSS with PostCSS
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [
                  autoprefixer
                ]
              }
            }
          },
          {
            // Loads a SASS/SCSS file and compiles it to CSS
            loader: 'sass-loader'
          }
        ]
      }
    ]
  },
  optimization: {
    minimize: true,
    minimizer: [
      // Plugin untuk meng-minify JavaScript
      new TerserPlugin(),
      // Plugin untuk meng-minify CSS
      new CssMinimizerPlugin()
    ]
  }
}