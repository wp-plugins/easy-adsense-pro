# To copy development *-pro plugins (under local SVN) to the wp-plugins
# directory (under WordPress.org's SVN). Also creates the zip file.
# Might need make -B to execute it (or make it .PHONEY)

%.zip : %
	@echo "\n\033[31mMaking the zip file $@ [pro version for WordPress]\033[0m"
	rsync -rptgoWLK --exclude */.svn* ../plugins/$< .
	zip -rb . $@ $< -x "*.svn*" -x "*.DS_Store"
	@echo "\033[31mDone $@\033[0m\n"
