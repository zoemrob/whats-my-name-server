import { fileURLToPath, URL } from 'node:url'

import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload';
import dotenv from 'dotenv';
import fs from 'fs';

// https://vitejs.dev/config/
export default ({ mode }) => {
  Object.assign(process.env, dotenv.parse(fs.readFileSync(`${__dirname}/../.env`)));
  const port = process.env.VITE_PORT;
  const origin = `${process.env.VITE_ORIGIN}:${port}`;

  return defineConfig({
    plugins: [
      vue(),
      liveReload([
        __dirname + '../views/**/*.php',
      ]),
    ],
    resolve: {
      alias: {
        '@': fileURLToPath(new URL('./src', import.meta.url))
      }
    },
    build: {
      manifest: '../public/manifest.json',
      outDir: '../public/dist',
      emptyOutDir: true,
      rollupOptions: {
        input: {
          js: './src/main.ts',
          css: './src/assets/main.css',
        },
        output: {
          entryFileNames: 'main.js',
          assetFileNames: ({name}) => {

            if (/\.(gif|jpe?g|png|svg)$/.test(name ?? '')){
              return 'images/[name].[ext]';
            }

            if (/\.css$/.test(name ?? '')) {
              return 'css/app.[ext]';
            }

            return '[name].[ext]';
          },
        }
      }
    },
    server: {
      // force to use the port from the .env file
      strictPort: true,
      port: port,

      // define source of the images
      origin: origin,
      hmr: {
        host: 'localhost',
      },
    },
  })
}

