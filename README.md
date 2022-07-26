# Billboard

## How To Start

- cp .env.example .env

- 設定env參數

- composer install

- php artisan migration

## API DOC

### 取得公布欄列表

Api Url: `api/v1/billborad`

Api 呼叫方式: GET

Response:

|  參數   | 格式  | 說明   |
|  ----  | ----  | ----  |
| id  | int | 公布欄編號 |
| title  | string | 標題 |
| body  | string | 內容 |
| published  | boolean | 是否發布 |

```json
{
    "data": [
        {
            "id": 1,
            "title": "test",
            "body": "test",
            "published": false
        },
        {
            "id": 2,
            "title": "test1",
            "body": "sdfadfwer",
            "published": true
        }
    ],
    "code": 200
}
```

### 新增公布欄

Api Url: `api/v1/billborad`

Api 呼叫方式: POST

Request:

|  參數   | 格式  | 必填   | 說明   |
|  ----  | ----  | ----  | ----  |
| title  | string | 必填 | 標題 |
| body  | string | 必填 | 內容 |
| published  | boolean | 非必填 | 是否發布 |

```json
{
    "title": "test",
    "body": "test",
    "published": true
}
```

Response:

```json
{
    "data": [],
    "code": 200
}
```

### 修改公布欄

Api Url: `api/v1/billborad/{id}`

Api 呼叫方式: PUT

Param:

|  參數   | 格式  | 必填   | 說明   |
|  ----  | ----  | ----  | ----  |
| id  | int | 必填 | 公布欄編號 |

Request:

|  參數   | 格式  | 必填   | 說明   |
|  ----  | ----  | ----  | ----  |
| title  | string | 必填 | 標題 |
| body  | string | 必填 | 內容 |
| published  | boolean | 非必填 | 是否發布 |

```json
{
    "title": "test",
    "body": "test",
    "published": true
}
```

Response:

```json
{
    "data": [],
    "code": 200
}
```

### 刪除公布欄

Api Url: `api/v1/billborad/{id}`

Api 呼叫方式: DELETE

Param:

|  參數   | 格式  | 必填   | 說明   |
|  ----  | ----  | ----  | ----  |
| id  | int | 必填 | 公布欄編號 |

Response:

```json
{
    "data": [],
    "code": 200
}
```