module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: false,
    },
    plugins: [require("daisyui")],
};
