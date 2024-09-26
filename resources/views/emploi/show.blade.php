<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Emploi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        @media print {
            h1 {
                display: none
            }

            #module {
                border: solid gray 1px
            }

            table {
                border: solid gray 1px
            }

            body {
                width: 100% !important;
            }

            #time {
                font-size: 14px;
            }
        }
    </style>
</head>

<body class="px-5 w-[80%] m-auto">
    <h1 class="font-semibold font-mono text-3xl pt-10">Emploi du Temp Group DD205</h1>
    <table class="shadow-4 mt-10">
        <thead class="bg-gray-100">
            <tr id="time" class="border-b">
                <th class="p-5">j/h</th>
                <th class="p-5" colspan="2">8:30 - 9:30</th>
                <th class="p-5" colspan="2">9:30 - 10:30</th>
                <th class="p-5" colspan="2">10:30 - 11:30</th>
                <th class="p-5" colspan="2">11:30 - 12:30</th>
                <th class="p-5" colspan="2">12:30 - 13:30</th>
                <th class="p-5" colspan="2">13:30 - 14:30</th>
                <th class="p-5" colspan="2">14:30 - 15:30</th>
                <th class="p-5" colspan="2">15:30 - 16:30</th>
                <th class="p-5" colspan="2">16:30 - 17:30</th>
                <th class="p-5" colspan="2">17:30 - 18:30</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">L</th>
                <td id="module"
                    class="p-5 bg-purple-300 text-center font-semibold text-gray-50 italic cursor-pointer hover:shadow-lg transition-all"
                    colspan="5">Développement back-end (5h)</td>
            </tr>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">M</th>
                <td colspan="10"></td>
                <td id="module"
                    class="p-5 bg-sky-300 text-center font-semibold text-gray-50 italic cursor-pointer hover:shadow-lg transition-all"
                    colspan="10">Développement back-end (5h)</td>
            </tr>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">M</th>
                <td class="p-5 text-center font-semibold text-gray-50 italic" colspan="">
                </td>
            </tr>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">J</th>
                <td colspan="5"></td>
                <td id="module"
                    class="p-5 bg-orange-300 text-center font-semibold text-gray-50 italic cursor-pointer hover:shadow-lg transition-all"
                    colspan="5">Français (2.5h)</td>
            </tr>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">V</th>
                <td id="module"
                    class="p-5 bg-sky-300 text-center font-semibold text-gray-50 italic cursor-pointer hover:shadow-lg transition-all"
                    colspan="10">Culture entrepreneuriale (5h)</td>
            </tr>
            <tr class="border-b">
                <th class="p-5 font-bold bg-gray-100">S</th>
                <td class="p-5  text-center font-semibold text-gray-50 italic"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <script>
        // printing functionality
        document.addEventListener("DOMContentLoaded", function() {
            console.log("first")
            window.print()
        })
        // Listen for changes in print mode
        window.matchMedia("print").addListener((media) => {
            if (!media.matches) {
                // on cancel
                console.log("Print cancelled");
                window.location.href = "http://127.0.0.1:8000/emploi";
            } 
        });
    </script>
</body>

</html>
