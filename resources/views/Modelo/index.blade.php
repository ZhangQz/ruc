 @ e x t e n d s ( ' l a y o u t s . m a s t e r ' )  
 @ s e c t i o n ( ' c o n t e n t ' )  
         < d i v   c l a s s = " c o n t a i n e r - f l u i d " >  
                 < h 1 > L i s t a   d e   M o d e l o s < / h 1 >  
                 < p   c l a s s = " l e a d " > N e s t a   p � g i n a   a p r e s e n t a m o s   u m a   l i s t a   d e   M o d e l o s   r e g i s t a d o s   n a   B D . . . < / p >  
                 < b r >  
                 < d i v   c l a s s = " c o n t a i n e r - f l u i d   t a b l e - r e s p o n s i v e " >  
                         < t a b l e   c l a s s = " t a b l e   t a b l e - h o v e r " >  
                                 < t h e a d >  
                                 < t r >  
                                         < t h > N �   V e � c u l o < / t h >  
                                         < t h > N o m e < / t h >  
                                         < t h > C o m b u s t i v e l < / t h >  
                                         < t h > N � m e r o   d e   L u g a r e s < / t h >  
                                         < t h > A n o   d e   C o n s t r u � � o < / t h >  
                                         < t h > E d i t a r < / t h >  
                                         < t h > A p a g a r < / t h >  
                                 < / t r >  
                                 < / t h e a d >  
                                 < t b o d y >  
                                 @ f o r e a c h ( $ m o d e l o s   a s   $ m o d e l o )  
                                         < t r >  
                                                 < t d > < ? p h p   e c h o   $ m o d e l o - > i d M o d e l o ;   ? > < / t d >  
                                                 < t d > < ? p h p   e c h o   $ m o d e l o - > n o m e ;   ? > < / t d >  
                                                 < t d > < ? p h p   e c h o   $ m o d e l o - > c o m b u s t i v e l ;   ? > < / t d >  
                                                 < t d > < ? p h p   e c h o   $ m o d e l o - > n u m _ l u g a r e s ;   ? > < / t d >  
                                                 < t d > < ? p h p   e c h o   $ m o d e l o - > a n o _ c o n s t r u c a o ;   ? > < / t d >  
  
                                                 < ! - -   c o l u n a   d e   e d i t a r   v e � c u l o   - - >  
                                                 < t d >  
                                                         < a   c l a s s = " b t n   b t n - d e f a u l t "   h r e f = " { {   U R L : : r o u t e ( ' m o d e l o . e d i t ' ,   $ m o d e l o - > i d M o d e l o )   } } " > < i m g   s r c = " { {   a s s e t ( ' i m a g e n s / e d i t . p n g ' )   } } "   w i d t h = " 2 0 "   h e i g h t = " 2 0 " > < / a >  
                                                 < / t d >  
  
                                                 < ! - -   c o l u n a   d e   a p a g a r   v e � c u l o   - - >  
                                                 < t d >  
                                                         < f o r m   a c t i o n = " { {   r o u t e ( ' m o d e l o . d e s t r o y ' ,   $ m o d e l o - > i d M o d e l o )   } } "   m e t h o d = " P O S T " >  
                                                                 < i n p u t   t y p e = " h i d d e n "   n a m e = " _ t o k e n "   v a l u e = " { {   c s r f _ t o k e n ( )   } } " >  
                                                                 < i n p u t   t y p e = " h i d d e n "   n a m e = " _ m e t h o d "   v a l u e = " D E L E T E " >  
                                                                 < b u t t o n   t y p e = " s u b m i t "   c l a s s = " b t n   b t n - d a n g e r " >  
                                                                         < i m g   s r c = " { {   a s s e t ( ' i m a g e n s / d e l e t e . p n g ' )   } } "   w i d t h = " 2 0 "   h e i g h t = " 2 0 " >  
                                                                 < / b u t t o n >  
                                                         < / f o r m >  
                                                 < / t d >  
                                         < / t r >  
                                 @ e n d f o r e a c h  
                                 < / t b o d y >  
                         < / t a b l e >  
                 < / d i v >  
                 < p > < a   h r e f = " { {   U R L : : r o u t e ( ' m o d e l o . c r e a t e ' )   } } " > P r e t e n d e   a d i c i o n a r   u m   M o d e l o   n o v o ? < / a > < / p >  
         < / d i v >  
 @ e n d s e c t i o n