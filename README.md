# AI Assist

A wrapper based on Laravel for OpenAi Assistants. It is quite light weight

## Installation

<strong>Requires</strong>
<li>php8.1</li>
<li>Node.js 14.16 < </li>
<li>Composer</li>
<li>Mysql / Apache2 (optional)</li>

### Start installation
<p>Start by cloning the repo</p>
<code>git clone git@github.com:joshiabir/AiAssit.git</code>

<p>Then do a composer install</p>
<code>cd AiAssist</code>
<code>composer install</code>

<p>Time for an npm install</p>
<code>npm install</code>
<code>npm run build</code>

<p>Then migrate the database, by default Sqlite</p>
<code>php artisan migrate</code>

### Other componenets to update
<p>You need to update the below fileds in your .env file</p>
<code>
OPEN_AI= (this is your OpenAI Key)
OPEN_AI_ASSISTANT= (This is your assistant key, you need to create an assitant in APIs of OpenAI)
SLACK_URL= (This is for new user signup notificaiton, ignore if note required)
GOOGLE_CLIENT_SEC= (This is for the signin with google functionality)
GOOGLE_CLIENT_ID= (This is for the signin with google functionality)

</code>
