import cv2
cap = cv2.VideoCapture('videos/004_001_001_20190923105824.mp4')
if (cap.isOpened() == False): 
  print("Unable to read camera feed")
 

count=0
while(True):
	ret, frame = cap.read()
	cv2.imwrite("Frames/%d.jpg" % count, frame) 
	print("writing frame--->",count)
	if ret==False:
		break

	count += 1

	
	
 
cap.release()
cv2.destroyAllWindows()
