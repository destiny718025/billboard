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
| announcer  | string | 公布者 |

```json
{
    "data": [
        {
            "id": 1,
            "title": "test",
            "body": "test",
            "announcer": "test"
        },
        {
            "id": 2,
            "title": "test1",
            "body": "sdfadfwer",
            "announcer": "billy"
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
| announcer  | string | 必填 | 公布者 |

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
| announcer  | string | 必填 | 公布者 |

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

## 服務架構

```
api經由路由器判斷進入哪個控制器,再由控制器的方法觸發服務方法,主要的
業務邏輯都會在服務層處理,服務層再去資料處理層取得資料,資料處理層主要
在處理資料的拼裝,最後把結果返回給使用者
```