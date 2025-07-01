import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        // Enable minification
        minify: "terser",
        // Enable CSS code splitting
        cssCodeSplit: true,
        // Enable source maps in production
        sourcemap: false,
        // Optimize chunk size
        chunkSizeWarningLimit: 1000,
        rollupOptions: {
            output: {
                // Optimize chunk loading
                manualChunks: {
                    vendor: ["alpinejs"],
                },
            },
        },
    },
    // Optimize development server
    server: {
        hmr: {
            overlay: false,
        },
    },
});
