<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?> | Design Patterns in WordPress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            :root {
                --color-black: #1c2024;
                --color-gray: #23282d;
                --color-blue: #0073aa;
            }

            *, ::after, ::before {
                box-sizing: inherit;
            }

            html,
            body {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                color: var(--color-gray);
                border-top: 20px solid var(--color-blue);
                font-family: Open Sans, sans-serif;
            }

            .container {
                max-width: 100%;
                width: 1200px;
                margin: auto;
                padding: 0 20px;
            }

            h1 {
                font-size: 45px;
                font-weight: 300;
                text-align: center;
                margin: 100px auto;
            }

            .patterns-grid {
                max-width: 1200px;
                margin: auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
                justify-content: space-evenly;
                justify-items: center;
                align-content: space-evenly;
                align-items: center;
            }

            .patterns-grid--item {

                color: var(--color-blue);
                font-size: 1.5em;
                font-weight: 300;

                height: 200px;
                width: 300px;
                border-radius: 5px;
                border: 2px solid var(--color-blue);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .patterns-grid--item {
                transition: all .15s ease-in-out;
            }

            .patterns-grid--item:nth-child(even):hover {
                transform: scale(1.05) rotate(1deg);
            }

            .patterns-grid--item:nth-child(odd):hover {
                transform: scale(1.05) rotate(-1deg);
            }

            .patterns-grid--item:hover a {
                border-bottom: 1px dashed var(--color-blue);
            }

            .patterns-grid--item {
                position: relative;
            }

            .patterns-grid--item a {
                color: inherit;
                text-decoration: none;
            }

            .patterns-grid--item a::before {
                cursor: pointer;
                content: " ";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .patterns-grid--icon {
                width: 100px;
            }

            .patterns-grid--item.is-disabled {
                opacity: .5;
                pointer-events: none
            }

            .colophon {
                text-align: center;

                color: white;
                background-color: var(--color-gray);

                margin-top: 100px;
                padding: 50px;
            }

            .colophon a {
                color: inherit;
                text-decoration: none;
                border-bottom: 1px dashed white;
            }
        </style>
    </head>

    <body>
        <div class="container"><?php echo $content; ?></div>
        <footer class="colophon">
            An open source project by <a href="://pluginarchitect.com">Plugin Architect</a>.
        </footer>
    </body>
</html>

