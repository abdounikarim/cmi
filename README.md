# Installation

Boot the project :
```bash
docker-compose up -d
```

[Download][1] symfony CLI

Start your webserver :
```bash
symfony serve -d
```

Run migrations :
```bash
symfony console d:m:m -n
```

Upload fixtures :
```bash
symfony console h:f:l -n
```

Create a `.env.local` file to handle your credentials :
```dotenv
OAUTH_FACEBOOK_CLIENT_ID=client_id
OAUTH_FACEBOOK_CLIENT_SECRET=client_secret
```

[1]: https://symfony.com/download
