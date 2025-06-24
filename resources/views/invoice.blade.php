<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reservation Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        @media print {
            @page {
                size: A4;
            }
        }

        ul {
            padding: 0;
            margin: 0 0 1rem 0;
            list-style: none;
        }

        body {
            font-family: "Inter", sans-serif;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        table th,
        table td {
            border: 1px solid silver;
        }

        table th,
        table td {
            text-align: left;
            padding: 8px;
            white-space: nowrap;
            /* Mencegah teks turun ke bawah */
            overflow: hidden;
            /* Menyembunyikan teks berlebih */
            text-overflow: ellipsis;
            /* Tambahkan "..." jika teks terlalu panjang */
            max-width: 150px;
            /* Batasi lebar kolom agar tidak merusak layout */
        }

        h1,
        h4,
        p {
            margin: 0;
        }

        .container {
            padding: 20px 0;
            width: 1000px;
            max-width: 90%;
            margin: 0 auto;
        }

        .inv-title {
            padding: 10px;
            border: 1px solid silver;
            text-align: center;
            margin-bottom: 30px;
        }

        .inv-logo {
            width: 150px;
            display: block;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        /* header */
        .inv-header {
            display: flex;
            margin-bottom: 20px;
        }

        .inv-header> :nth-child(1) {
            flex: 2;
        }

        .inv-header> :nth-child(2) {
            flex: 1;
        }

        .inv-header h2 {
            font-size: 20px;
            margin: 0 0 0.3rem 0;
        }

        .inv-header ul li {
            font-size: 15px;
            padding: 3px 0;
        }

        /* body */
        .inv-body table th,
        .inv-body table td {
            text-align: left;
        }

        .inv-body {
            margin-bottom: 30px;
        }

        /* footer */
        .inv-footer {
            display: flex;
            flex-direction: row;
        }

        .inv-footer> :nth-child(1) {
            flex: 2;
        }

        .inv-footer> :nth-child(2) {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inv-title">
            <h1>Invoice # {{ rand() }}__{{ $reservation->id }}</h1>
        </div>
        <p style="margin-bottom: 30px; font-weight: bold">PT.INDUSTRI GOLF INDONESIA</p>
        <img src="{{ asset('images/logos/logoKP.png') }}" alt="Company Logo" style="width: 150px; margin-bottom: 30px; display: block;">
        <div class="inv-header">
            <div>
                <ul>
                    <li>
                        <PT_INDUSTRIGOLFINDONESIA class="TBK"></PT_INDUSTRIGOLFINDONESIA>
                    </li>
                    <li>Jakarta Selatan, 12620</li>
                    <li>+6287773333109 </li>
                    <li>industrigolfindonesia@gmail.com</li>
                </ul>
                <h2>Client</h2>
                <ul>
                    <li>{{ $reservation->user->name }}</li>
                    <li>{{ $reservation->user->email }}</li>
                </ul>
            </div>



        </div>
        <div class="inv-body">
            <table>
                <thead>
                    <th>Golf Car</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Duration</th>
                    <th>Price per day</th>
                    <th>Reservation price</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h4>{{ $reservation->car->brand }} {{ $reservation->car->model }}</h4>
                            <p>{{ $reservation->car->engine }}</p>
                        </td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->days }}</td>
                        <td> Rp {{ $reservation->price_per_day }}0.000 </td>
                        <td> Rp {{ $reservation->total_price }}0.000 </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="inv-footer">
            <div>
                <!-- Keterangan atau catatan bisa ditambahkan di sini -->
            </div>
            <div>
                @php
                $subTotal = $reservation->total_price;
                $totalBayar = $subTotal;
                @endphp
                <table>
                    <tr>
                        <th style="color:rgb(28, 30, 2)">Total to Pay</th>
                        <td><strong>Rp {{ number_format($totalBayar, 2) }}0.000</strong></td>
                    </tr>
                </table>
            </div>
        </div>

        <h3 style="text-align: center; margin-top: 30px">Terima Kasih Telah Memesan </h3>
    </div>
    <script>
        window.addEventListener('load', function() {
            // Function to print the page
            function printPage() {
                window.print(); // Print the page

                // Close the window after printing or cancelling
                setTimeout(function() {
                    window.close(); // Close the window
                }, 1000); // Adjust the delay as needed (milliseconds)

                // After a short delay to allow the page to render, convert it to PDF
                setTimeout(function() {
                    const pdf = new jsPDF(); // Create a new jsPDF instance
                    pdf.addHTML(document.body, function() {
                        pdf.save('page_as_pdf.pdf'); // Save the PDF as 'page_as_pdf.pdf'
                    });
                }, 2000); // Adjust the delay as needed (milliseconds)
            }

            printPage(); // Call the function to print the page and convert it to PDF
        });
    </script>
</body>

</html>