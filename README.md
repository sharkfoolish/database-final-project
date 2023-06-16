# Database-Final-Project
資料庫期末專案

## Teammates
- 411077019 余信陞
- 411077027 黃柏誠

## Database

| bills | cards | categories | customers | customer_informations |
| -------- | -------- | -------- | -------- | -------- |
| 1     | 8   | 3   | 10   | 10   |

|  goods | inventories_of_store | inventories_of_warehouse | orders | order_items |
| -------- | -------- | -------- | -------- | -------- |
| 13   | 108   | 12   | 21   | 42   |

| packages | products | shipments | stores |
| -------- | -------- | -------- | -------- | 
| 2   | 12   | 8   | 10   |

### ER-Model
![ER-Model](/ER-Model.png)
### Schema Diagram
![Schema Diagram](/Schema-Diagram.png)

## File Structure
- `APP` : backend
- `migrations` : create_tables.sql
- `api.php` : API
- `autoload.php` : load class
- `env.php` : set config of environment
- `index.html` : index-view

## Program
參照 `Model-View-Controller`
1. View 發送 Request 到 Server 
2. API 依據 $_SERVER\["REQUEST_METHOD"\] and $GET\['route'\] 呼叫相對應的 Controller -> function()
3. Controller 依據需要用到的資料呼叫相對應的 Model::static-function()
4. 利用 Controller::response(data)，轉換成 JSON 格式傳送給 Frontend

