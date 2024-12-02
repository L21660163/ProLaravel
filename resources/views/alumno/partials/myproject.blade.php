<style>
        * {
            margin: 90;
            padding: 30;
            box-sizing: border-box;
        }


        .card {
            width: 90%;
            max-width: 800px;
            height: 95%;
            background-image: url('https://img.freepik.com/premium-vector/blue-diagonal-lines-blue-background_322958-3841.jpg');
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .card-header {
            text-align: center;
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.8em;
            font-weight: bold;
        }

        .card-content {
            flex-grow: 1;
            margin-top: 20px;
            text-align: center;
        }

        .card-content h2 {
            font-size: 1.5em;
            color: gray;
            margin-bottom: 10px;
        }

        .card-content p {
            font-size: 1.2em;
            margin-bottom: 15px;
            color: #555;
        }

        .card-content .project-title {
            color: #ff5722;
            font-size: 1.3em;
            font-weight: bold;
        }

        .card-content .published {
            font-style: italic;
            color: #777;
        }

        .button-container {
            margin: 20px 0;
        }

        .btn {
            color: blue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }


        .progress-bar {
            width: 100%;
            height: 30px;
            background: #e0e0e0;
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            margin: 20px 0;
        }

        .progress-bar span {
            display: block;
            height: 100%;
            background: #76c7c0;
        }

        .stage {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.9em;
            color: white;
            font-weight: bold;
            position: relative;
        }

        .stage:nth-child(odd) {
            background: #3498db;
        }

        .stage:nth-child(even) {
            background: #9b59b6;
        }

        .card-footer {
            margin-top: 20px;
            text-align: center;
        }

        .card-footer h3 {
            font-size: 1.4em;
            color: blanchedalmond;
        }

        .card-footer p {
            color: blanchedalmond;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">INSTITUTO TECNOLÓGICO DE MATEHUALA</div>
        <div class="card-content">
            <h2>ENTREGA DE DOCUMENTOS:</h2>
            <p>AESOR: <span style="font-weight:bold;">Dr. Juan Pérez</span></p>
            <p class="project-title">Prototipo Didáctico de Internet de las Cosas mediante el uso de IoT Cloud de Arduino</p>
            <p class="published">Publicado hace: 1 día</p>
            <div class="button-container">
                <button class="btn">
                    <i class="fas fa-file-alt"></i> Ver Reporte Preliminar
                </button>
            </div>
            <div class="progress-bar">
                <span class="stage">Etapa 1</span>
                <span class="stage">Etapa 2</span>
                <span class="stage">Etapa 3</span>
                <span class="stage">Etapa 4</span>
                <span class="stage">Etapa 5</span>
                <span class="stage">Etapa 6</span>
            </div>
        </div>
        <div class="card-footer">
            <h3>Integrantes:</h3>
            <p>Jimena Mendoza</p>
            <p>Pedro González</p>
        </div>
    </div>
</body>