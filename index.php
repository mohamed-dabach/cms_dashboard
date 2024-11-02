<?php
// Configuration
$base_paths = [
    'wordpress' => __DIR__ . '/wordpress',
    'prestashop' => __DIR__ . '/prestashop'
];

$base_urls = [
    'wordpress' => './wordpress/',
    'prestashop' => './prestashop/'
];

// Helper functions
function getProjectName($dir)
{
    return basename($dir);
}

function getLastModified($dir)
{
    return date("F d, Y H:i:s", filemtime($dir));
}

function getProjects($path)
{
    return array_filter(glob($path . '/*'), 'is_dir');
}

// Get active tab from URL parameter, default to wordpress
$active_tab = isset($_GET['type']) && in_array($_GET['type'], array_keys($base_paths))
    ? $_GET['type']
    : 'wordpress';

// Get projects for active tab
$projects = getProjects($base_paths[$active_tab]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Menu</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f4f4f4;
            --card-background: #ffffff;
            --text-color: #7f8c8d;
            --hover-color: #2980b9;

        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: var(--background-color);
        }

        h1 {
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 30px;
        }

        .nav-tabs {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .nav-tab {
            padding: 10px 20px;
            background-color: var(--card-background);
            border-radius: 5px;
            text-decoration: none;
            color: var(--text-color);
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border: 2px solid #bbb;
        }

        .nav-tab:hover,
        project-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-tab.active {
            background-color: var(--primary-color);
            color: white;
            opacity: .6;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
        }

        .project-card {
            background-color: var(--card-background);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .project-name {
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 10px;
            color: var(--primary-color);
            display: block;
        }

        .project-date {
            font-size: 0.9em;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .project-links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .project-link {
            text-decoration: none;
            color: var(--primary-color);
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9em;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        /* .project-link:hover {
            background-color: var(--primary-color);
            color: white;
        } */

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }

        svg {
            max-width: 20px;
            max-height: 20px;
        }

        .active svg,
        .nav-tab:hover svg,
        project-link:hover svg {
            fill: white;
        }

        .flex {
            display: flex;
            gap: 10px;
        }
    </style>

</head>

<body>
    <h1>Development Projects</h1>

    <nav class="nav-tabs">
        <a href="/phpmyadmin" target="_blank" class="nav-tab">
            <svg fill="#7f8c8d" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>phpmyadmin</title>
                <path d="M20.804 22.613c-2.973 0.042-5.808 0.573-8.448 1.514l0.183-0.057c-3.584 1.22-3.688 1.685-6.936 1.303-1.718-0.263-3.265-0.75-4.698-1.436l0.1 0.043c1.696 1.366 3.785 2.312 6.071 2.65l0.069 0.008c2.444-0.149 4.708-0.785 6.741-1.812l-0.099 0.045c2.215-0.774 4.768-1.222 7.426-1.222 0.137 0 0.273 0.001 0.409 0.004l-0.020-0c3.437 0.216 6.645 0.763 9.727 1.614l-0.332-0.078c-1.791-0.855-3.889-1.593-6.074-2.107l-0.216-0.043c-1.147-0.27-2.464-0.425-3.817-0.425-0.030 0-0.060 0-0.090 0l0.005-0zM28.568 17.517l-22.394 3.81c1.127 0.399 1.921 1.455 1.921 2.697 0 0.042-0.001 0.084-0.003 0.125l0-0.006c-0.011 0.276-0.058 0.536-0.138 0.783l0.006-0.020c2.266-1.041 4.916-1.918 7.675-2.498l0.25-0.044c1.478-0.336 3.175-0.528 4.917-0.528 1.035 0 2.055 0.068 3.054 0.2l-0.117-0.013c0.908-2.119 2.635-3.741 4.772-4.489l0.057-0.017zM10.052 5.394s3.007 1.332 4.156 6.932c0.236 0.86 0.372 1.848 0.372 2.867 0 1.569-0.321 3.063-0.902 4.42l0.028-0.073c1.648-1.56 3.878-2.518 6.332-2.518 0.854 0 1.68 0.116 2.465 0.333l-0.065-0.015c-0.462-2.86-1.676-5.378-3.431-7.418l0.017 0.020c-2.128-2.674-5.334-4.411-8.95-4.548l-0.022-0.001zM7.831 5.348c1.551 2.219 2.556 4.924 2.767 7.849l0.003 0.051c0.033 0.384 0.051 0.83 0.051 1.281 0 1.893-0.326 3.71-0.926 5.397l0.035-0.113c0.906-1.076 2.215-1.788 3.692-1.902l0.018-0.001c0.062-0.005 0.124-0.008 0.185-0.010 0.083-0.603 0.13-1.3 0.13-2.008 0-2.296-0.498-4.476-1.391-6.437l0.040 0.097c-0.865-1.999-2.516-3.519-4.552-4.19l-0.053-0.015z"></path>
            </svg>
            PhpMyAdmin


        </a>
        <div class="flex">


            <a href="?type=wordpress" title="Wordpress" class="nav-tab <?php echo $active_tab === 'wordpress' ? 'active' : ''; ?>">
                <svg fill="#7f8c8d" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px"
                    height="800px" viewBox="0 0 512 512" xml:space="preserve">

                    <g id="7935ec95c421cee6d86eb22ecd133f51">

                        <path style="display: inline;" d="M0.513,255.987c0,101.127,58.76,188.531,144.006,229.938L22.645,152.016
		C8.472,183.779,0.513,218.96,0.513,255.987z M428.476,243.101c0-31.588-11.341-53.446-21.06-70.45
		c-12.949-21.059-25.088-38.874-25.088-59.92c0-23.492,17.803-45.349,42.891-45.349c1.148,0,2.221,0.137,3.307,0.199
		C383.089,25.938,322.521,0.5,256,0.5c-89.263,0-167.784,45.798-213.47,115.149c6.001,0.2,11.652,0.325,16.443,0.325
		c26.723,0,68.104-3.244,68.104-3.244c13.76-0.823,15.395,19.412,1.634,21.046c0,0-13.848,1.622-29.243,2.42l93.042,276.747
		l55.903-167.685l-39.797-109.062c-13.773-0.798-26.798-2.42-26.798-2.42c-13.761-0.824-12.151-21.87,1.622-21.046
		c0,0,42.18,3.244,67.293,3.244c26.71,0,68.092-3.244,68.092-3.244c13.773-0.823,15.395,19.412,1.622,21.046
		c0,0-13.86,1.622-29.23,2.42l92.332,274.638l25.487-85.134C421.988,292.491,428.476,264.957,428.476,243.101z M260.491,278.331
		l-76.662,222.765C206.722,507.819,230.937,511.5,256,511.5c29.768,0,58.299-5.14,84.847-14.484c-0.674-1.098-1.31-2.258-1.821-3.53
		L260.491,278.331z M480.199,133.427c1.098,8.134,1.722,16.867,1.722,26.261c0,25.924-4.866,55.08-19.425,91.509l-78.035,225.621
		c75.952-44.289,127.026-126.565,127.026-220.831C511.487,211.574,500.135,169.806,480.199,133.427z">

                        </path>

                    </g>

                </svg>
                WP
            </a>
            <a href="?type=prestashop" title="Prestashop" class="nav-tab <?php echo $active_tab === 'prestashop' ? 'active' : ''; ?>">
                PS
                <svg fill="#7f8c8d" width="800px" height="800px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg">

                    <path d="M11.558 1.034C5.174 1.034 0 6.21 0 12.592c0 1.258.201 2.47.574 3.597l.002-.007a12.415 12.415 0 01.53-1.787l.011-.03c.085-.222.179-.442.277-.66l.084-.181c.08-.171.165-.34.253-.507.036-.068.07-.136.108-.203.02-.038.044-.073.064-.11.094-.166.19-.332.29-.493l.075-.114c.125-.195.256-.386.393-.573l.035-.05c.144-.193.295-.38.451-.563l.1-.118c.155-.177.315-.35.481-.517l.099-.097a10.321 10.321 0 01.546-.503c.74-2.48 3.005-4.285 5.686-4.285 1.079 0 2.152.31 3.071.873a6.017 6.017 0 012.211 2.407l.007.015.04.074v.003l.004.002a9.925 9.925 0 011.567 1.198c.04.037.081.071.12.109.002 0 .006.005.007.006l-.002-.006-.001-.004v-.003l.042-.084c.377-2.384 1.43-4.102 2.67-4.102.934 0 1.762.975 2.276 2.476l.005.016.001.002c.145.158.287.331.424.521l.007.01.021.067-.02-.078c-1.542-4.569-5.863-7.857-10.952-7.857zM9.927 5.477C7.586 5.52 5.34 7.132 4.574 9.365l-.012.034a10.14 10.14 0 011.315-.895c2.806-1.656 6.479-1.646 9.278.016-.895-1.653-2.631-2.819-4.5-3.004a5.14 5.14 0 00-.728-.039zm9.834.5a1.36 1.36 0 00-.39.067c-1.265.562-1.719 2.073-2.031 3.303l-.016.072c.365-.62.808-1.215 1.396-1.642.835-.687 2.105-.655 2.916.053.308.326.141.008.031-.22-.342-.75-1.025-1.653-1.906-1.634zM21.67 7.98zm-9.32.335l-1.07 3.27-.002.005-.006.002-4.498 1.112h-.009l4.456 1.087c.105.11.227.205.36.28h.002c.042.024.085.045.129.065l.01.005c.041.018.083.033.126.047l.021.008c.04.013.08.023.12.032l.033.008a1.677 1.677 0 00.318.033 1.546 1.546 0 001.43-.948c.08-.186.123-.39.123-.604v-.011l-.001-.012c-.001-.054-.004-.107-.01-.16l-.001-.002a1.506 1.506 0 00-.026-.153l-.001-.004a1.511 1.511 0 00-.096-.288v-.003a1.521 1.521 0 00-.348-.49v-.003zm3.148.626c.048 1.008.036 2.046-.1 3.057-.17 2.018-1.19 3.798-1.972 5.616l-.03.08-.035.086c1.51-1.522 3.17-3.04 3.969-5.082.383-.636.118-1.342-.115-1.976-.17-.877-1.069-1.278-1.717-1.781zm6.172.572l-.588 2.688a1.764 1.764 0 00-.047.2c-.002.02-.007.04-.01.06a1.76 1.76 0 00-.016.222l-.002.031h.003c0 .628.297 1.136.663 1.137a.41.41 0 00.182-.045l.027-.015a.537.537 0 00.07-.047c.013-.01.024-.022.036-.033a.752.752 0 00.137-.168l.03-.054a1.23 1.23 0 00.052-.108l.017-.04c.02-.053.038-.108.053-.166l.002-.002.001-.003.404-.451-.407-.456v.001l-.02-.063zm-4.381.856c.69 1.716.85 3.707.091 5.43-.49 1.368-1.587 2.463-1.874 3.905.73.115 1.468.176 2.21.186 2.166.029 4.332-.42 6.284-1.365-2.04-2.869-4.121-5.755-6.711-8.156zm-4.948.977a.583.583 0 110 1.166.583.583 0 010-1.166zm9.352.37c.138 0 .249.19.249.426s-.111.426-.249.426c-.137 0-.248-.19-.248-.426 0-.235.11-.426.248-.426zm-4.044.184c-.016.112-.033.209-.05.29l-.006.023c-.01.05-.022.094-.033.128-.48 1.417-1.275 2.52-2.36 3.697-.147.16-.301.32-.459.484a58.883 58.883 0 01-1.196 1.205c-.112.11-.259.261-.425.436-.103.287-.22.61-.318.95-.044-.016-.086-.031-.131-.049-2.108-.815-3.519-1.904-3.519-1.904s1.086 1.414 2.915 2.74c.177.129.351.24.522.339-.075 1.194.452 2.34 2.83 2.682a4.81 4.81 0 001.228.008l-.01-.029a.062.062 0 00-.004-.01s-.167-.133-.379-.377a3.842 3.842 0 01-.584-.897 3.382 3.382 0 01-.266-.862 3.176 3.176 0 01-.006-.972c.017-.12.04-.241.072-.366.093-.374.255-.772.507-1.192l.002-.003.241-.404c1.103-1.86 1.797-3.275 1.506-5.441a8.943 8.943 0 00-.078-.476zm4.668.576l.001.008-.001-.008zm.013.203l.003.036v.01c0 .013-.003.025-.003.038 0-.014.003-.028.003-.043 0-.014-.002-.026-.003-.04zm-.012.275v.001l-.002.01-.002.014.004-.025zm1.353 5.928c-2.553 1.138-5.44 1.44-8.192 1.007-.14 1.108.384 2.218 1.214 2.93l.012.01c2.703-.433 4.975-2.168 6.966-3.946z" />
                </svg>
            </a>
        </div>
    </nav>

    <div class="project-grid">
        <?php if (empty($projects)): ?>
            <div class="empty-state">
                No <?php echo ucfirst($active_tab); ?> projects found.
            </div>
        <?php else: ?>
            <?php foreach ($projects as $project):
                $projectName = getProjectName($project);
                $baseUrl = $base_urls[$active_tab];
            ?>
                <div class="project-card">
                    <a href="<?php echo htmlspecialchars($baseUrl . $projectName); ?>"
                        class="project-name"
                        target="_blank">
                        <?php echo htmlspecialchars($projectName); ?>
                    </a>
                    <div class="project-date">
                        <?php echo htmlspecialchars(getLastModified($project)); ?>
                    </div>
                    <div class="project-links">
                        <a href="<?php echo htmlspecialchars("vscode://file/" . $project); ?>"
                            class="project-link"
                            target="_blank">
                            VS Code
                        </a>
                        <?php if ($active_tab === 'wordpress'): ?>
                            <a href="<?php echo htmlspecialchars($baseUrl . $projectName . "/wp-admin"); ?>"
                                class="project-link"
                                target="_blank">
                                WP Admin
                            </a>
                        <?php else: ?>
                            <a href="<?php echo htmlspecialchars($baseUrl . $projectName . "/admin"); ?>"
                                class="project-link"
                                target="_blank">
                                PS Admin
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>