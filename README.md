BeautiPrice [Beautiful Price]
เป็น PHP function Helper ช่วยจัดรูปแบบ ราคาสินค้า
กำหนดการปัดราคา ขึ้น/ลง ให้สวยงาม โดยระบุตำแหน่งการปัดได้
แตกต่างจาก fuction Round(),Celi(),floor() 
เช่น ราคา 56 >> เปลี่ยนเป็น 59
ราคา 1,674 >>  เปลี่ยนเป็น 1,670
ราคา 16,782 >> เปลี่ยนเป็น 16,780 หรือ 16,790


Function xPrice() : เติม 'x' เข้าไปในราคา
19,999 >> 19xxx

ตัวอย่างการใช้ : $newPrice = xPrice($price,$cutoff=2)
+ $price - ราคาปรกติ
+ $cutoff - หลักที่คงไว้ไม่เปลี่ยนแปลงs